<style>
    .alert{
        color: white;
        height: 29px;
        padding: 0px 5px 0px 20px;
        border: 3px solid #FFFFFF;
        border-radius: 3px;
        box-shadow: 0px 0px 1px 0px #000000;
    }
    #viewdealers{      
        margin-top: 50px;
    }
    .details{
        border: 1px solid rgba(0, 0, 0, 0.18);
    }
    .hideme{
        display:none;
    }
    .bg-white{
        background-color: rgba(255, 255, 255, 1);
        margin-top:15px;
        margin-bottom:15px;
        padding: 20px;
    }
    .thumbnail div{
        height:140px;
        background-size: cover;
        background-position: center;
    }
    .box{
        padding: 4px 4px;
    }
    .thumbnail{
        margin-bottom: 0px; 
    }
    .name{
        text-align: right;
        float: right;
        padding: 0 10px 0 10px;
    }
    #mainbox
    {
        border-radius:4px;
        border: 1px solid rgba(0, 0, 0, 0.18);
        margin-top:50px;
        margin-bottom:50px;
        background-color: rgba(236, 236, 236, 0.6);

    }
    .subheader
    {
        text-align: center;   
        font-weight: normal;
        font-size: 34px;
        text-transform: capitalize;
        padding: 32px 2px 15px;

    }
    .placename {
        height:60px;
        text-align:center;
        background-color: #FFFFFF;
        margin: 1px;
        background-image: url('<?= IMAGES_PATH; ?>blackArro.jpg');
        background-repeat: no-repeat;
        background-position: right;
        border-right: solid 2px #FFFFFF;
    }
    .placename:hover {
        background-color: #ccc;
    }
    .active{
        background-color: #ccc;
    }
    .placename h4 {
        font-size: 17px;
        line-height: 3px;
        text-transform: capitalize;
        font-weight: bold;
        padding-top: 20px;
        cursor:pointer
    }
    #left,#right{
        font-size: 45px;
        cursor:pointer
    }
    .tittle{
        font-size: 20px;
        background: #ccc;
        padding: 15px;
        color: #000;
        text-align: center;
    }
    .borderBox{
        border: solid 1px #cccccc;
    }
    .company{
        background: #fff;
    }
    .dotBorderBox{
        border: dotted 1px #cccccc;
    }
</style>