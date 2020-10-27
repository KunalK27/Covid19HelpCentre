/* 
Available Spots and Summary:
Total Cases, Active Cases, Deaths, Recovered, Change Ratio %, Summary
Historical data:
Day, Week, Month, Year, Change per Day, Difference, Summary
Regions:
World, Regions and Countries

Read documentation for more functionality - https://rapidapi.com/Yatko/api/coronavirus-live
See all available countries - https://api.quarantine.country/api/v1/summary/latest
*/

var countryFeedKey = 'usa'; //try china, spain, italy, etc.
var countryName = 'USA';    //try 中国, España, Italia, etc.

function ready(cb) {
  if( document.readyState !== 'loading' ) {
    cb();
  } else {
    document.addEventListener('DOMContentLoaded', function () {
        cb();
    });
  }
}

function fetchData(url) {
  return fetch(url)
    .then(function(response) {
      if(response.ok) {
        return response.json();
      }
    })
    .then(function(payload) {
      return payload['data'] || {};
    });
}

function formatNumber(number, precision, separate, separator, comma) {
  if(!number) {
    return '';
  }

    var re = '\\d(?=(\\d{' + (separate || 3) + '})+' + (precision > 0 ? '\\D' : '$') + ')',
        num = number.toFixed(Math.max(0, ~~precision));

    return (coma ? num.replace('.', comma) : num).replace(new RegExp(re, 'g'), '$&' + (separator || ','));
};

function fillPlaceholders(data) {
  var i;
  var varEl = document.querySelectorAll('[data-var-placeholder]');

  for(i = 0; i < varEl.length; i++) {
    var placeholder = varEl[i].getAttribute('data-var-placeholder');

    if(placeholder && placeholder != '') {
      switch(placeholder) {
        case 'country':
          varEl[i].innerText = countryName;    
          break;
      }
    }
  }

  // var placeholderEl = document.querySelectorAll('[data-placeholder]');

  // for(i = 0; i < placeholderEl.length; i++) {
  //   var placeholder = placeholderEl[i].getAttribute('data-placeholder');

  //   if(placeholder && placeholder != '' && data['summary'][placeholder]) {
  //     placeholderEl[i].innerText = parseInt(data['summary'][placeholder]).toLocaleString();
  //   }
  // }

  var countryPlaceholderEl = document.querySelectorAll('[data-country-placeholder]');

  for(i = 0; i < countryPlaceholderEl.length; i++) {
    var placeholder = countryPlaceholderEl[i].getAttribute('data-country-placeholder');

    if(placeholder && placeholder != '' && data['summary'][placeholder]) {
      countryPlaceholderEl[i].innerText = parseInt(data['summary'][placeholder]).toLocaleString();
    }
  }
}

ready(
  function() {
    var url = 'https://api.quarantine.country/api/v1/summary/region?region=' + countryFeedKey;

    fetchData(url)
        .then(fillPlaceholders);

    setInterval(
      function() {
        fetchData(url)
          .then(fillPlaceholders);
      },
      10000
    );
  }
);
