<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script type="text/javascript">
		tinymce.init({
			selector: 'textarea',
			menubar: true,
			plugins: [
	            'image imagetools link lists'
	        ],
	        image_caption: true,
	        image_title: true,
			relative_urls: false,
	        file_browser_callback: function(field_name, url, type, win) {
	            // trigger file upload form
	            if (type == 'image') $('#formUpload input').click();
	        }
		});
	</script>