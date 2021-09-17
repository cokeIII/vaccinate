<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "setHead.php"; ?>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<body>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="text-center text-primary">
                <h4>เตรียมความพร้อมเปิดภาคเรียนที่ 2/2564 สถานศึกษาปลอดภัย เด็กได้รับวัคซีนถ้วนหน้า
                <h5 class="text-danger"><b> ทำความเข้าใจกับ video ทั้ง 4 ชุดก่อน จึงจะทำรายการต่อไปได้</b></h5> 
            </div>
            
            <div class="row">
                <!-- <div class="text-center"> -->
                    <!-- <a data-toggle="modal" href="#myModal" id="aa1">
                        <img src="./img/video1.jpg" width="200px" alt=""></a> -->
                <!-- </div> -->
                
                <p data-toggle="modal" data-target="#myModal1" class="text-center" id="v1">
                    <img src="./img/video1.jpg" width="400px" alt=""></p>

                <p data-toggle="modal" data-target="#myModal2" class="text-center">
                    <img src="./img/video2.jpg" width="400px" alt=""></p>

                <p data-toggle="modal" data-target="#myModal3" class="text-center">
                    <img src="./img/video3.jpg" width="400px" alt=""></p>

                <p data-toggle="modal" data-target="#myModal4" class="text-center">
                    <img src="./img/video4.jpg" width="400px" alt=""></p>
                


                <!-- <iframe width="1077" height="480" src="https://www.youtube.com/embed/KWJfL-kzLKA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <br>
                <iframe width="1077" height="480" src="https://www.youtube.com/embed/-9C-isSnH9s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <br>
                <iframe width="1077" height="480" src="https://www.youtube.com/embed/K3vWwl6w23g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <br>
                <iframe width="1077" height="480" src="https://www.youtube.com/embed/W2gyAyuSYYY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <iframe width="480" height="315" src="https://www.youtube.com/embed/KWJfL-kzLKA?autoplay=1" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <iframe width="480" height="315" src="https://www.youtube.com/embed/-9C-isSnH9s" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal3" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <iframe width="480" height="315" src="https://www.youtube.com/embed/K3vWwl6w23g" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal4" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <iframe width="480" height="315" src="https://www.youtube.com/embed/W2gyAyuSYYY" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                </div>
            </div>
        </div>
    </div>
    
    <!-- Close Modal -->

</body>

</html>
<?php require_once "setFoot.php"; ?>
<script>
$(document).ready(function(){
  $("#v1").click(function(){
      alert ("aaa")
    // $("#myModal").modal();
  });
});
</script>