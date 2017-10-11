new Vue({
		
		el: '#app',
		
		mounted() {
			// Make an ajax request to our server - /admin/games
			axios.get('/testGames').then(response => console.log(response));
		}
		
});