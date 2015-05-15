/**
 * Created by cathylee on 5/11/15.
 */

$(document).ready(function() {

  $("#go").click(function(){ getMostViewed(); $('.nytImageContainer').empty(); });



});


function getMostViewed() {
  var keyword = $('#nytInput').val().split(' ').join('+');
  console.log(keyword);

  var url = "http://api.nytimes.com/svc/search/v2/articlesearch.json?callback=svc_search_v2_articlesearch&q=" + encodeURIComponent(keyword) + "&sort=newest&page=1&api-key=18a905653b4f0581867fa5199b5156e0%3A5%3A72064799";
  console.log(url);


  $.ajax({
    url: url,
    context: document.body
  })
  .done(function(data){
    // console.log(data);

    var articles = data.response.docs;
    console.log(articles);
    articles.forEach(function(e){

    articles.forEach(function(e, i){
      var headline = e.headline.print_headline;
      console.log (headline);
      if( headline !== undefined ) {
      $('.nytImageContainer').append("<div class='row headline'><h4>" + headline + "</h4>");
      } else
      $('.nytImageContainer').append("<div class='row headline'><h4 style='color: #DDD;'>'no title provided by nyt'</h4>"); 


      var website = e.web_url;
      console.log (website);
      $('.nytImageContainer').append("<div class='row headline'><p><a href='" + website + "'>" + website + "</a></p>");


      var multimedia = e.multimedia[1];
      // console.log(multimedia);

      if (!jQuery.isEmptyObject(multimedia)) {
          // console.log(multimedia);
          // multimedia.forEach(function(e){
            var imgUrl = multimedia.url
            // console.log(imgUrl);
            // return (imgUrl);
            $('.nytImageContainer').append("<div class='col-xs-12 nytImgDiv'><img src='http://www.nytimes.com/" + imgUrl + "' style='border-radius: 10px; margin: 20px;'/></div>");

        }
        // )}
      else {

      }
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
    //         $('.articleImage').append("<img src='http://www.nytimes.com/" + imgUrl + "' class='pull-left' style='border-radius: 50px'/>");
    //     })}
    //   else { }
    //   // console.log(imgUrl);
    // });

  })
}
