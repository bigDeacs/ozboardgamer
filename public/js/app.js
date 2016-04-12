var client = algoliasearch('LAC06A9QLK', 'fdfd933ae74a447ae896c1279229c83b');
      var games = client.initIndex('games');

      autocomplete('#search-terms', {hint: false}, [
        {
          source: autocomplete.sources.hits(games, {hitsPerPage: 5}),
          displayKey: 'name',
          templates: {
            header: '<div class="category">Games</div>',
            footer: '<div class="pull-right col-xs-2"><img src="/img/Algolia_logo_bg-white.jpg" class="img-responsive" /></div>',
            suggestion: function(suggestion) {
              console.log(suggestion);
              return '<a href="'+suggestion.slug+'"><div class="row">'+
                '<div class="col-xs-2"><img src="'+suggestion.thumb+'" class="img-responsive" /></div>'+
                '<div class="col-xs-6">'+suggestion._highlightResult.name.value+'</div>'+
                '<div class="col-xs-2"><div class="text-center lead"><strong>'+Number(suggestion.rating).toFixed(1)+'/10</strong></div></div>'+
                '<div class="col-xs-2"><img src="/img/'+Math.ceil(Number(suggestion.rating))+'.png" class="img-responsive" /></div>'+
              '</div></a>';              
            }
          }
        }
      ]).on('autocomplete:selected', function(event, suggestion, dataset) {
        console.log(suggestion, dataset);
      });



      (function(window){

            // get vars
            var searchEl = document.querySelector("#input");
            var labelEl = document.querySelector("#label");

            // register clicks and toggle classes
            labelEl.addEventListener("click",function(){
                if (classie.has(searchEl,"focus")) {
                    classie.remove(searchEl,"focus");
                    classie.remove(labelEl,"active");
                } else {
                    classie.add(searchEl,"focus");
                    classie.add(labelEl,"active");
                }
            });

            // register clicks outisde search box, and toggle correct classes
            document.addEventListener("click",function(e){
                var clickedID = e.target.id;
                if (clickedID != "search-terms" && clickedID != "search-label") {
                    if (classie.has(searchEl,"focus")) {
                        classie.remove(searchEl,"focus");
                        classie.remove(labelEl,"active");
                    }
                }
            });
        }(window));