new Vue({
		
		el: '#root',
		
		mounted() {
			// Make an ajax request to our server - /admin/games
			axios.get('/admin/games').then(response => console.log(response));
		}
		
});