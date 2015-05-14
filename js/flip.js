/**
 * Created by cathylee on 5/11/15.
 */

$(document).ready(function() {

  $("#go").click(function(){ getMostViewed(); });



});


function getMostViewed() {
  var url = "http://api.nytimes.com/svc/search/v2/articlesearch.json?callback=svc_search_v2_articlesearch&q=web+design&sort=newest&page=1&api-key=<KEY>”;

  // console.log(url);

  $.ajax({
    url: url,
    context: document.body
  })
  .done(function(data){
    // console.log(data);

    var articles = data.response.docs;
    // console.log(articles);

    articles.forEach(function(e){
      var multimedia = e.multimedia[1];
      // console.log(multimedia);
      if (!jQuery.isEmptyObject(multimedia)) {
          // console.log(multimedia);
          // multimedia.forEach(function(e){
            var imgUrl = multimedia.url
            console.log(imgUrl);

            $('.nytImageDiv').append("<div class='row'><img src='http://www.nytimes.com/" + imgUrl + "' style='border-radius: 10px; margin: 10px;'/></div>");

        }
        // )}
      else {}
      // console.log(imgUrl);
    });

    // articles.forEach(function(e){
    //   var articleUrl = e.web_url;
    //   console.log(articleUrl);
    // });

    // articles.forEach(function(e){
    //   var multimedia = e.multimedia;
    //   console.log(multimedia);
    //   if (!jQuery.isEmptyObject(multimedia)) {
    //       // console.log(multimedia);
    //       multimedia.forEach(function(e){
    //         var imgUrl = e.url
    //         console.log(imgUrl);
    //
    //         $('.articleImage').append("<img src='http://www.nytimes.com/" + imgUrl + "'  style='border-radius: 50px; margin: 10px;’/>”);
    //     })}
    //   else { }
    //   // console.log(imgUrl);
    // });

  })
}
