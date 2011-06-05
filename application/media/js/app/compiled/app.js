(function() {
	// Global app object everything will be inside of
	app = {
		controller: {},
		model: {},
		view: {}
	};
})();
(function() {
	app.controller.page_main_gallery = {
		init: function() {
			this.model = new app.model.GalleryPage();
			this.view = new app.view.GalleryPage({model: this.model, el: $('body')});
		}
	};
})();
(function() {
	app.model.GalleryPage = Backbone.Model.extend({
		initialize: function() {
			this.images = new app.model.ImageCollection();
		}
	});
	app.model.ImageCollection = Backbone.Collection.extend({
		model: Image
	});
	app.model.Image = Backbone.Model.extend({
		remove: function() {
			if (this.collection) this.collection.remove(this);
		}
	});
})();
(function() {
	app.view.Image = Backbone.View.extend({
		className: 'image',
		initialize: function(args) {
			_.bindAll(this, 'render');

			this.template = $('#page_main_gallery-image').html();
		},
		events: {
			'click img': 'removeImage',
			'mouseover img': 'imageMouseOver',
			'mouseout img' : 'imageMouseOut'
		},
		render: function() {
			$(this.el)
				.html(Mustache
					.to_html(this.template, this.model.toJSON()));

			return this;
		},
		removeImage: function() {
			this.model.remove();
			$(this.el).remove();
		},
		imageMouseOver: function() {
			//$(this.el).css('background', 'blue');
			this.$('img')
				.css('left', '-15px')
				.css('width', '150px')
				.css('top', '-15px')
				.css('height', '150px')
				.css('z-index', '100')
				.addClass('larger');
		},
		imageMouseOut: function() {
			//$(this.el).css('background', 'none');
			this.$('img')
				.css('left', '10px')
				.css('width', '100px')
				.css('top', '10px')
				.css('height', '100px')
				.css('z-index', '1')
				.removeClass('larger');
		}
	});
	app.view.GalleryPage = Backbone.View.extend({
		initialize: function() {
			_.bindAll(this, 'addImage', 'collectionFromDom');
			// this.model is the collection we pass in when creating this instance
			this.model.images.bind('add', this.addImage);
			//this.model.images.bind('remove', this.removeImage);

			this.imageList = this.$('#gallery');

			this.collectionFromDom();
			this.addImageLink();
		},
		events: {
			'click .add-image-link': 'addImageLinkClick'
		},
		collectionFromDom: function() {
			var collection = this.model.images;

			$('.image', this.imageList).each(function() {
				var url = $('img', $(this)).attr('src');
				var image = new app.model.Image({url: url});
				var view = new app.view.Image({
					model: image,
					el: $(this)
				});

				collection.add(image, {silent: true});
			});
		},
		addImageLink: function() {
			this.imageList.after($('<a></a>')
				.addClass('add-image-link')
				.attr('href', '#')
				.text('Add Another'));
		},
		addImageLinkClick: function() {
			var url = prompt('URL:');

			if (url !== null) {
				var image = new app.model.Image({url: url});
				this.model.images.add(image);
			}
		},
		addImage: function(image) {
			var view = new app.view.Image({model: image});
			this.imageList.append(view.render().el);
		}
	});
})();
(function() {
	// Initialize the app here
	$(function() {
		var $body = $('body');
		var body_id = $body.attr('id');

		if (app.controller[body_id] && app.controller[body_id].init)
		{
			$.ajax(Kohana.media_url + '/js/app/compiled/templates.mustache',{
				success: function(response){
					$body.append(response);
					app.controller[body_id].init();
				}
			});
		}
	});
})();