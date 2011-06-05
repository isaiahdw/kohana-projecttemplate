(function() {
	app.view.Image = Backbone.View.extend({
		className: 'image',
		initialize: function(args) {
			_.bindAll(this, 'render');

			this.template = $('#page_main_gallery-image').html();
		},
		events: {
			'click img': 'removeImage'
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