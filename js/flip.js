
$(document).ready(function() {

  $("#searchForm").on('submit', function(e){
    e.preventDefault();
    // console.log('submitted');
    getMostViewed();
    $('.nytImageContainer').empty();
  });

  var btnInfo = getButtonInfo();

  // resetBtn();



  // var likeBtnInfo = getButtonInfo();
  // console.log(likeBtnInfo);
  //
  // var test = setTimeout(test(2), 10000);
  // console.log(test);

});


function getMostViewed() {
  var keyword = $('#nytInput').val().split(' ').join('+');

  console.log(keyword);

  var url = "http://api.nytimes.com/svc/search/v2/articlesearch.json?callback=svc_search_v2_articlesearch&q="
  + encodeURIComponent(keyword)
  + "&sort=newest&page=1&api-key=18a905653b4f0581867fa5199b5156e0%3A5%3A72064799";

  console.log(url);


  $.ajax({
    url: url,
    context: document.body
  }).done(function(data){
    // console.log(data);

    var articles = data.response.docs;
    console.log(articles);

    articles.forEach(function(e, i){
      var headline = e.headline.print_headline;
      var itemID = e._id;
      // console.log (headline);
      // console.log (i);
      // console.log (itemID);

      if( headline !== undefined ) {
        $('.nytImageContainer').append("<div class='row headline' id='headline"+ i +"'><h4>" + headline + "</h4>");
      } else {
        $('.nytImageContainer').append("<div class='row headline' id='headline"+ i +"'><h4 style='color: #DDD;'>'no title provided by nyt'</h4>");
      }


      var website = e.web_url;
      // console.log (website);
      $('.nytImageContainer').append("<div class='row headline' id='website"+ i + "'><p><a href='" + website + "'>" + website + "</a></p>");

      var multimedia = e.multimedia[1];
      // console.log(multimedia);

      if (!jQuery.isEmptyObject(multimedia)) {
        var imgUrl = multimedia.url

        $('.nytImageContainer').append(
          "<div class='col-xs-12 nytImgDiv' id='image"+ i +"'><img src='http://www.nytimes.com/" + imgUrl + "' style='border-radius: 10px; margin: 20px;'/></div>"
        + "<form class='likeForm' role='form'><div class='form-group'>"
        + "<input name='like' type='submit' value='like it' class='btn btn-default' style='margin: 5px;' data-id='" + itemID + "'></div></form>");

      }


    });

  });

};



function getButtonInfo() {
  $('.nytImageContainer').on('click', '.likeForm input', function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    var buttonInfo = $(this).data('id');

    console.log(buttonInfo);

    var url = 'http://api.nytimes.com/svc/search/v2/articlesearch.json?callback=svc_search_v2_articlesearch&fq=_id:("'
    + encodeURIComponent(buttonInfo)
    + '")&api-key=18a905653b4f0581867fa5199b5156e0%3A5%3A72064799';

    console.log(url);


    $.ajax({
      url: url,
      context: document.body,
      method: "GET"
    }).done(function(data){

      console.log(data);
      var oneWebUrl = data.response.docs[0].web_url;
      var oneArticleImage = data.response.docs[0].multimedia[1].url;

      console.log(oneWebUrl);
      console.log(oneArticleImage);

      // $('.savedImagesDiv').append(
      //   "<div class='col-xs-12 saveImgDiv'><a href='" + oneWebUrl +
      //   "'><img src='http://www.nytimes.com/"
      //   + oneArticleImage + "' style='border-radius: 10px; margin: 20px; height: 75px; width: auto;'/></a></div>")

      $('.savedImagesDiv').append(
        "<a href='" + oneWebUrl +
        "'><img src='http://www.nytimes.com/"
        + oneArticleImage + "' style='border-radius: 10px; margin: 20px; height: 75px; width: auto;'/></a></div>")


    });


  });

  // jsan.stringify
};

//
// function resetBtn() {
//   $('#reset').on('click' function(e){
//     e.preventDefault;
//     e.stopImmediatePropagation;
//     $('.savedImagesDiv').empty();
//   })
// };
