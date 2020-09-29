
    var audio;
    var plays;
    var playbutton;
    playbutton = $('.PlayButton');
    if(playbutton.length>1) console.log("worked!");
    else console.log("not worked!");
    $('.PlayButton').on("click", function(event){
        console.log(event.target.id);
        var id = "Audio" + event.target.id;
        audio = document.getElementById(id);

        if(audio.paused){
            $('.Audio').each(function () {
                if (!this.paused &&  this.duration > 0) {
                this.pause();
                id = (this.id).substring(5);
                console.log("id of song that was playing = " + id);
                playbutton = document.getElementById(id);
                playbutton.src = "assets/images/icon/pause.png";
                playbutton.style.opacity = "20%";
                }
                });
            audio.play();
            event.target.src= "assets/images/icon/play.png";
            event.target.style.opacity = "60%";
        }
        else {
            audio.pause();
            event.target.src= "assets/images/icon/pause.png";
            event.target.style.opacity = "20%";
        }
        if(audio.currentTime === 0) {up(event.target.id);}; 
    });


    function up(id){
        $.post("includes/updateStreams.php", {songId: id}, function(data){
            var newStream = data;
            plays = document.getElementById("streams" + id);
            console.log(plays.innerHTML + " newStream = " + newStream);
            plays.innerHTML = newStream;
        });

    };
    
    $('.Audio').on("ended", function () {
                id = (this.id).substring(5);
                console.log("id of song that ended = " + id);
                var playbutton = document.getElementById(id);
                playbutton.style.opacity = "10%";
                });

    $('.heart').on("click", function(event){
        id = (event.target.id).substring(5);
        console.log(event.target.id);
        var element = document.getElementById(event.target.id);
        
        
        if(element.src == "http://localhost/artistifia/assets/images/icon/close-heart.png"){
            //already like
            console.log(user);
            console.log("something else");
            $.post("includes/LikeAndUnlikeSongs.php", {songId: id, fun: "unlike"}, function(data){
                alert(data);
            });
            element.src = 'assets/images/icon/open-heart.webp';
        }
        else if(element.src == "http://localhost/artistifia/assets/images/icon/open-heart.png") {
            $.post("includes/LikeAndUnlikeSongs.php", {songId: id, fun: "like"}, function(data){
                alert(data);
            });
            element.src = "assets/images/icon/close-heart.png";
        }
        else console.log("faulty");
        
    });

    