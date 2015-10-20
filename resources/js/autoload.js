        function autoload(url) {
         
            var tags = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            limit: 10,
                prefetch: {
                  // url points to a json file that contains an array of country names, see
                  // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                  url: url,
                  filter: function(list) {                  
                    return $.map(list, function(tags) { return { name: tags }; });
                  }
                }
              });
            tags.initialize();

            // passing in `null` for the `options` arguments will result in the default
            // options being used
            $('#prefetch .typeahead').typeahead(null, {
              name: 'tags',
              displayKey: 'name',
              // `ttAdapter` wraps the suggestion engine in an adapter that
              // is compatible with the typeahead jQuery plugin
              source: tags.ttAdapter()
            });
        }