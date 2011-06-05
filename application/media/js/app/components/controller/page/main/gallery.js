(function() {
	app.controller.page_main_gallery = {
		init: function() {
			this.model = new app.model.GalleryPage();
			this.view = new app.view.GalleryPage({model: this.model, el: $('body')});
		}
	};
})();