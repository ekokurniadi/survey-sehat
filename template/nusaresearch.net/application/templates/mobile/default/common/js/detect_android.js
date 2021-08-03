window.addEventListener('load', function() {
   var outputElement = document.getElementById('output');
   window.addEventListener('beforeinstallprompt', function(e) {
	 outputElement.textContent = 'beforeinstallprompt Event fired';
   });
});