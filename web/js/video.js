
var figure;
var videosPreparados = 0;
var videos = document.getElementsByTagName("video");
for (let i=0;i<videos.length;i++) {
  videos[i].oncanplay = function() {
    videosPreparados+=1;
    if(videosPreparados>=2){
      figure = $(".video").hover( hoverVideo, hideVideo );
    }
  };
}

function hoverVideo(e) {
    $('video', this).get(0).play();
}

function hideVideo(e) {
    $('video', this).get(0).pause();
}
