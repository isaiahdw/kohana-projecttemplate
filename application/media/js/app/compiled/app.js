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

	});
})();
(function() {
	app.view.Image = Backbone.View.extend({
		initialize: function(args) {

		},
		render: function() {
			this.el = Mustache
				.to_html($('#page_main_gallery-image')
					.html(), this.model.toJSON());

			return this;
		}
	});
	app.view.GalleryPage = Backbone.View.extend({
		initialize: function() {
			_.bindAll(this, 'addImage');
			// this.model is the collection we pass in when creating this instance
			this.model.images.bind('add', this.addImage);
			this.model.images.bind('remove', this.removeImage);

			this.imageList = this.$('#gallery');

			this.addImageLink();
		},
		events: {
			'click .add-image-link': 'addImageLinkClick'
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
		},
		removeImage: function(image) {

		}
	});
})();
(function() {
	// Initialize the app here
	$(function() {
		var body_id = $('body').attr('id');

		if (app.controller[body_id] && app.controller[body_id].init)
		{
			app.controller[body_id].init();
		}
	});
})();