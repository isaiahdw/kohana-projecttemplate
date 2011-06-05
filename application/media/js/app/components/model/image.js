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