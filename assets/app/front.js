var frontApp=angular.module('frontApp',['frontController','frontService'])

frontApp.filter('_uriseg', function($location) {
  return function(segment) {
    // Get URI and remove the domain base url global var
    var query = $location.absUrl().replace("http://127.0.0.1/coba/ci_api/","");
    // To obj
    var data = query.split("/");    
    // Return segment *segments are 1,2,3 keys are 0,1,2
    if(data[segment-1]) {
      return data[segment-1];
    }
    return false;
  }
});


