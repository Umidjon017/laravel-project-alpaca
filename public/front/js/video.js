let play_state = 0;
let vol_state = 1;
let last_vol = 1;
let a;

var width = document.querySelector(".volume-button").getBoundingClientRect().width;
document.querySelector(".present-volume").style.width = `${(width-18)*last_vol}px`;
document.onload = function() {
    let m = document.querySelector(".my-video")
    var minutes = Math.floor(m.duration / 60);
    minutes = (minutes > 9) ? minutes : `0${minutes}`
    var seconds = Math.floor(((m.duration / 60) - minutes) * 60);
    seconds = (seconds > 9) ? seconds : `0${seconds}`
    document.querySelector(".time-duration").innerHTML = `00:00/${minutes}:${seconds}`;
}


document.querySelector(".play-pause").onclick = function() {
    document.querySelector('.video-cover').innerHTML = '<i class="fas fa-play"></i>';
    if (play_state == 0 || play_state == 2) {
        play_state = 1;
        document.querySelector(".my-video").play()
        this.innerHTML = `<i class="fas fa-pause"></i>`;
        document.querySelector(".video-cover").style.opacity = "0";
    } else {
        play_state = 0;
        document.querySelector(".my-video").pause()
        this.innerHTML = `<i class="fas fa-play"></i>`;
        document.querySelector(".video-cover").style.opacity = "1";

    }
}

document.querySelector(".my-video").onclick = function() {
    e = document.querySelector(".play-pause")
    document.querySelector('.video-cover').innerHTML = '<i class="fas fa-play"></i>';
    if (play_state == 0) {
        play_state = 1;
        document.querySelector(".my-video").play()
        e.innerHTML = `<i class="fas fa-pause"></i>`;
        document.querySelector(".video-cover").style.opacity = "0";

    } else {
        play_state = 0;
        document.querySelector(".my-video").pause()
        e.innerHTML = `<i class="fas fa-play"></i>`;
        document.querySelector(".video-cover").style.opacity = "1";
    }
}


document.querySelector(".video-cover").onclick = function() {
    e = document.querySelector(".play-pause")
    document.querySelector('.video-cover').innerHTML = '<i class="fas fa-play"></i>';

    if (play_state == 0 || play_state == 2) {
        play_state = 1;
        document.querySelector(".my-video").play()
        e.innerHTML = `<i class="fas fa-pause"></i>`;
        document.querySelector(".video-cover").style.opacity = "0";

    } else {
        play_state = 0;
        document.querySelector(".my-video").pause()
        e.innerHTML = `<i class="fas fa-play"></i>`;
        document.querySelector(".video-cover").style.opacity = "1";
    }
}

var $video=$('.my-video');
//fullscreen button clicked
$('.full-screen').on('click', function() {
$(this).toggleClass('enterFullscreenBtn');
    if($.isFunction($video.get(0).webkitEnterFullscreen)) {
              if($(this).hasClass("enterFullscreenBtn")){
                  document.querySelector('.video-element').webkitRequestFullScreen();
                  document.querySelector('.control-box').style.height = '7%';
              }   
              else{ 
                document.webkitCancelFullScreen();  
                document.querySelector('.control-box').style.height = '10%';
              }
    }  
    else if ($.isFunction($video.get(0).mozRequestFullScreen)) {
              if($(this).hasClass("enterFullscreenBtn")){
                  document.querySelector('.video-element').mozRequestFullScreen(); 
                  document.querySelector('.control-box').style.height = '7%';
              }
               else{
                  document.mozCancelFullScreen();  
                  document.querySelector('.control-box').style.height = '10%';
               }
    }
    else { 
           alert('Your browsers doesn\'t support fullscreen');
    }
});

document.querySelector(".volume-button").oninput = function() {
    document.querySelector(".my-video").volume = this.value
    last_vol = this.value
    console.log(last_vol)
    var width = document.querySelector(".volume-button").getBoundingClientRect().width;
    document.querySelector(".present-volume").style.transform = `scaleX(${last_vol})`
    if (this.value == 0) {
        vol_state = 0;
        document.querySelector(".mute-button").innerHTML = `<i class="fas fa-volume-off"></i>`
    } else {
        vol_state = 1;
        document.querySelector(".mute-button").innerHTML = `<i class="fas fa-volume-up"></i>`
    }
}

document.querySelector(".mute-button").onclick = function() {
    var width = document.querySelector(".volume-button").getBoundingClientRect().width;
    if (vol_state == 1) {
        document.querySelector(".my-video").volume = 0;
        vol_state = 0;
        this.innerHTML = `<i class="fas fa-volume-off"></i>`;
        document.querySelector(".volume-button").value = 0;
        document.querySelector(".present-volume").style.transform = `scaleX(0)`
    } else {
        document.querySelector(".my-video").volume = last_vol;
        document.querySelector(".volume-button").value = last_vol;
        vol_state = 1;
        this.innerHTML = `<i class="fas fa-volume-up"></i>`;
        document.querySelector(".present-volume").style.transform = `scaleX(${last_vol})`
    }
}

document.querySelector(".my-video").ontimeupdate = function() {
    var percentage = Math.floor((100 / this.duration) *
        this.currentTime);
    document.querySelector(".progress-slider").value = percentage;
    var width = document.querySelector(".progress-slider").getBoundingClientRect().width;
    document.querySelector(".completed-track").style.width = `${width*percentage/100}px`

    var minutes = Math.floor(this.duration / 60);
    minutes = (minutes > 9) ? minutes : `0${minutes}`
    var seconds = Math.floor(((this.duration / 60) - minutes) * 60);
    seconds = (seconds > 9) ? seconds : `0${seconds}`

    var c_minutes = Math.floor(this.currentTime / 60);
    c_minutes = (c_minutes > 9) ? c_minutes : `0${c_minutes}`

    var c_seconds = Math.floor(((this.currentTime / 60) - c_minutes) * 60);
    c_seconds = (c_seconds > 9) ? c_seconds : `0${c_seconds}`
    document.querySelector(".time-duration").innerHTML = `${c_minutes}:${c_seconds}/${minutes}:${seconds}`

    if (this.duration == this.currentTime) {
        document.querySelector(".progress-slider").value = 0;
        var width = document.querySelector(".progress-slider").getBoundingClientRect().width;
        document.querySelector(".completed-track").style.width = `${0}px`
        document.querySelector(".play-pause").innerHTML = `<i class="fas fa-redo-alt"></i>`;
        document.querySelector('.video-cover').innerHTML = '<i class="fas fa-redo-alt"></i>';
        play_state = 2;
        document.querySelector(".video-cover").style.opacity = "1";
    }
}

document.querySelector(".progress-slider").oninput = function() {
    e = document.querySelector(".my-video");
    var percentage = this.value;
    var ctime = Math.floor((e.duration * this.value) / 100)
    e.currentTime = ctime;
    var width = document.querySelector(".progress-slider").getBoundingClientRect().width;
    document.querySelector(".completed-track").style.width = `${width*percentage/100}px`
}

document.querySelector(".video-element").onmousemove = function() {
    clearTimeout(a);
    document.querySelector(".video-element .control-box").style.transform = "none";
    document.querySelector(".video-element .control-box").style.opacity = "1";
    document.querySelector(".video-cover").style.height = "93%";
    a = setTimeout(function() {
        document.querySelector(".video-element .control-box").style.transform = "translateY(100%)";
        document.querySelector(".video-element .control-box").style.opacity = "0";
        document.querySelector(".video-cover").style.height = "100%";
    }, 3000)

}


document.querySelector('.my-video').onwaiting = function() {
  document.querySelector('.video-cover').innerHTML = '<i class="fas fa-spinner rotating"></i>'
  document.querySelector('.video-cover').style.opacity = '1'
}

document.querySelector('.my-video').oncanplay = function() {
  if (play_state != 0 && play_state != 2) {
    document.querySelector('.video-cover').style.opacity = '0';
  }
  document.querySelector('.video-cover').innerHTML = '<i class="fas fa-play"></i>';
}