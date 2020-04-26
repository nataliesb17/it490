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
		{ name: '', type: '', evolution: '', generation: '', img: ''},
		{ name: '', type: '', evolution: '', generation: '', img: ''},
		{ name: '', type: '', evolution: '', generation: '', img: ''},
		{ name: '', type: '', evolution: '', generation: '', img: ''},
<<<<<<< HEAD
=======
		{ name: '', type: '', evolution: '', generation: '', img: ''},
>>>>>>> e42b4c8df989e00d0630310c0b32b1e58ed746c0
		{ name: '', type: '', evolution: '', generation: '', img: ''}
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
			'<p id="name" value="' + result.name + '" class="card-text" style="font-weight: bold;">' + result.title + '</p>' +
			'<p id="price" value="' + result.price + '" class="card-text">$' + result.price + '</p>' +
			'<button type="button" class="btn btn-light">Add to Team</button>' +
			'</div>' +
			'</div>';
		});
<<<<<<< HEAD

=======
>>>>>>> e42b4c8df989e00d0630310c0b32b1e58ed746c0
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
		var sortedResults = (sortValue === 'name') ? 
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

	// Function to filter out non-vegan results
	function toggleVegan(showVegan) {
		// If showVegan is TRUE, only display published results
		// Filter will only inclue objects that return TRUE from it's query
		var filteredResults = pokemonDatabase.filter(function (result) {
			// If showVegan is TRUE, always show.
			// Otherweise only show if vegan is TRUE
			return showVegan || result.vegan;
		});
		renderPokemon(filteredResults);
	}
	
	// Change events trigger after the value of a form input changes
	document.querySelector('#vegan').addEventListener('change', function(event){
		// in this case value is a string that we need to convert to a boolean 
		var value = event.target.value === 'true';
		toggleVegan(value);
	});
	
	function toggleRanges(showRanges){
		var filteredResults = pokemonDatabase.filter(function (result){
			return showRanges || result.priceRange;
		});
		renderPokemon(filteredResults);
	}
	
	document.querySelector('#priceRanges').addEventListener('change', function(event){
		// in this case value is a string that we need to convert to a boolean 
		if (event.target.value === 'true'){
			var value = event.target.value === 'low';
			toggleRanges(value);
		}
		else{
			var value = event.target.value === 'high';
			toggleRanges(value);
		}
	});
})(); // Wrap entire file in self executing function. 
<<<<<<< HEAD
      // Keeping all variables declared in this file inside a local scope.
=======
      // Keeping all variables declared in this file inside a local scope.
>>>>>>> e42b4c8df989e00d0630310c0b32b1e58ed746c0
