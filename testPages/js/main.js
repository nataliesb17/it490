var foo = 'foo'; // Variables declared outside of any function are considered global variables.
				 // These variables can be found on the window object.
(function () {
	// Any kind of function, will create a new variable scope. Variables declared in this 
	// function will only be accesible inside this function, unless passed by reference through
	// a function call. 

	// Lower level scope will always overwrite a higher level scope.  
	var foo = 'bar';
	console.log(foo); // 'bar'
	// Global Variables can still be accessed through window object 
	console.log(window.foo); // 'foo'

	// An array of Objects, similar to database records we will eventually be dealing with.
	//CONNECT TO API HERE
	var pokemonDatabase = [
		{ name: 'bulbasaur', type: 'grass', evolution: 'lowest', generation: 'I', img: '../img/pokemon_imgs/bulbasaur.png'},
		{ name: 'charmander', type: 'fire', evolution: 'lowest', generation: 'I', img: '../img/pokemon_imgs/charmander.png'},
		{ name: 'squirtle', type: 'water', evolution: 'lowest', generation: 'I', img: '../img/pokemon_imgs/squirtle.png'},
		{ name: 'caterpie', type: 'bug', evolution: 'lowest', generation: 'I', img: '../img/pokemon_imgs/caterpie.png'},
		{ name: 'blastoise', type: 'water', evolution: 'lowest', generation: 'I', img: '../img/pokemon_imgs/blastoise.png'},
		{ name: 'pidgey', type: 'normal', evolution: 'lowest', generation: 'I', img: '../img/pokemon_imgs/pidgey.png'}
	];

	function renderPokemon (results) {
		var pokemonList = document.querySelector('#pokemon');

		// clear out inner HTML to get rid of any older results
		pokemonList.innerHTML = '';
		// Map each database record to a string containing the HTML for it's row
		var pokemon = results.map(function (result) {
			return '<div id="pokemon" class="card" style="width: 18rem;">' +
			'<img class="card-img-top" src="' + result.img + '">' +
			'<div class="card-body">' +
			'<p id="name" value="' + result.name + '" class="card-text" style="font-weight: bold;">' + result.name + '</p>' +
			'<p id="type" value="' + result.type + '" class="card-text">' + result.type + '</p>' +
			'<p id="type" value="' + result.evolution + '" class="card-text">' + result.evolution + '</p>' +
			'<p id="type" value="' + result.generation + '" class="card-text">' + result.generation + '</p>' +
			'<button type="button" class="btn btn-light">Add to Team</button>' +
			'</div>' +
			'</div>';
		});

		// Set the contents of the table body to the new set of rendered HTML rows
		pokemon.forEach(function (column) {
			pokemonList.innerHTML += column; // += adds to HTML instead of overwriting it entirely.
		});

		// Lower level scope once again overwrites what's above it.
		var foo = 'renderPokemon';
		console.log(foo); // 'renderPokemon'
	}

	renderPokemon(pokemonDatabase);

	// Function to Order results list 
	function orderBy(sortValue) {
		// Sort method varies based on what type of value we're sorting 
		var sortedResults = (sortValue === 'nameaz') ? 
			pokemonDatabase.sort(function (a, b) { // Strings need to be sorted in a slightly more compldex way
				var nameA = a.name.toUpperCase(); // ignore upper and lowercase
				var nameB = b.name.toUpperCase(); // ignore upper and lowercase
				// Sorts alphabetically.  -1 puts it before. 1 puts it after
				if (nameA < nameB) {
				    return -1;
				}
				if (nameA > nameB) {
				    return 1;
				}
			}) : 
			pokemonDatabase.sort(function (a, b) { // Numbers a booleans are much simpler. 
												// Just need postive or negative number 
				// Object properties can be accessed through a string representing their name
				return a[sortValue] - b[sortValue];
			});
			var sortedResults = (sortValue === 'nameza') ? 
			pokemonDatabase.sort(function (a, b) { // Strings need to be sorted in a slightly more compldex way
				var nameA = a.name.toUpperCase(); // ignore upper and lowercase
				var nameB = b.name.toUpperCase(); // ignore upper and lowercase
				// Sorts alphabetically.  -1 puts it before. 1 puts it after
				if (nameA < nameB) {
				    return 1;
				}
				if (nameA > nameB) {
				    return -1;
				}
			}) : 
			pokemonDatabase.sort(function (a, b) { // Numbers a booleans are much simpler. 
												// Just need postive or negative number 
				// Object properties can be accessed through a string representing their name
				return a[sortValue] - b[sortValue];
			});
			var sortedResults = (sortValue === 'type') ? 
			pokemonDatabase.sort(function (a, b) { // Strings need to be sorted in a slightly more compldex way
				var typeA = a.type.toUpperCase(); // ignore upper and lowercase
				var typeB = b.type.toUpperCase(); // ignore upper and lowercase
				// Sorts alphabetically.  -1 puts it before. 1 puts it after
				if (typeA < typeB) {
				    return -1;
				}
				if (typeA > typeB) {
				    return 1;
				}
			}) : 
			pokemonDatabase.sort(function (a, b) { // Numbers a booleans are much simpler. 
												// Just need postive or negative number 
				// Object properties can be accessed through a string representing their name
				return a[sortValue] - b[sortValue];
			});
			var sortedResults = (sortValue === 'evolution') ? 
			pokemonDatabase.sort(function (a, b) { // Strings need to be sorted in a slightly more compldex way
				var evolutionA = a.evolution.toUpperCase(); // ignore upper and lowercase
				var evolutionB = b.evolution.toUpperCase(); // ignore upper and lowercase
				// Sorts alphabetically.  -1 puts it before. 1 puts it after
				if (evolutionA < evolutionB) {
				    return -1;
				}
				if (evolutionA > evolutionB) {
				    return 1;
				}
			}) : 
			pokemonDatabase.sort(function (a, b) { // Numbers a booleans are much simpler. 
												// Just need postive or negative number 
				// Object properties can be accessed through a string representing their name
				return a[sortValue] - b[sortValue];
			});
			var sortedResults = (sortValue === 'generation') ? 
			pokemonDatabase.sort(function (a, b) { // Strings need to be sorted in a slightly more compldex way
				var generationA = a.generation.toUpperCase(); // ignore upper and lowercase
				var generationB = b.generation.toUpperCase(); // ignore upper and lowercase
				// Sorts alphabetically.  -1 puts it before. 1 puts it after
				if (generationA < generationB) {
				    return -1;
				}
				if (generationA > generationB) {
				    return 1;
				}
			}) : 
			pokemonDatabase.sort(function (a, b) { // Numbers a booleans are much simpler. 
												// Just need postive or negative number 
				// Object properties can be accessed through a string representing their name
				return a[sortValue] - b[sortValue];
			});
		renderPokemon(sortedResults);
	}
	// Change events trigger after the value of a form input changes
	document.querySelector('#sortMenu').addEventListener('change', function(event){
		// Event is the JavaScript event that transpired, in our change a CHANGE event.
		// Target is the element it was performed on, useful for when the event targets 
		// multiple elements.
		// Value has the name implies is the current value of the input element, if there is one
		orderBy(event.target.value);
	});
})(); // Wrap entire file in self executing function. 
      // Keeping all variables declared in this file inside a local scope.
