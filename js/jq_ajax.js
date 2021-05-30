$(document).ready(function(){

    readData();


    //read data ......................
    function readData(){
        txt = "";
        $.ajax({
            url: "read.php",
            method: "GET",
            dataType: 'json',
            success: function(res){
                if(res){
                    d = res;
                }else{
                    d="no data";
                }
                for(i=0; i<d.length; i++){
                    //console.log(d[i].name);
                    txt += "<tr><td>"+d[i].id+"</td><td>"+d[i].name+"</td><td>"+d[i].email+"</td><td>"+d[i].phone+"</td><td><button class='btn btn-warning btn-sm editBtnId' data-bs-toggle='modal' data-bs-target='#exampleModal' v="+d[i].id+" n="+d[i].name+" e="+d[i].email+" p="+d[i].phone+">Edit</button><button class='btn btn-danger btn-sm deleteBtnId' v="+d[i].id+">Delete</button>";
                }
                $("#tbodyId").html(txt);
            }
        });
    };


    //creat data........................
    $("#saveBtnId").click(function(e){
        e.preventDefault();
        //alert("jQuery is working.");
        let nm = $("#nameId").val();
        let em = $("#emailId").val();
        let ph = $("#phoneId").val();

        mdata = {name: nm, email: em, phone: ph};

        $.ajax({
            url: "insert.php", 
            method: "POST", 
            data: JSON.stringify(mdata), 
            success: function(res){
                //console.log(res);
                //txt = "<div>"+res+"</div>";
                //$("#msg").html(txt);
                
                if(res == "1"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data has been saved',
                        showConfirmButton: false,
                        timer: 2000
                      });
                $("#saveFormId")[0].reset();
                readData();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: res,
                      })
                }
            },
        });
    });    


    //delete data ....................

    $("#tbodyId").on("click", ".deleteBtnId", function(){
        let id = $(this).attr("v");
        trThis = this;
        mData = {sid: id};
        $.ajax({
            url: 'delete.php',
            method: 'POST',
            data: JSON.stringify(mData),
            success: function(res){
                if(res=="1"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data has been Deleted',
                        showConfirmButton: false,
                        timer: 2000
                      });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: res,
                      })
                }
                //readData(); or use fadeout
                $(trThis).closest("tr").fadeOut();
            }
        });

    });



    //update data ...........................................

    //sent data to modal form
    $("#tbodyId").on("click", ".editBtnId", function(){

        let id = $(this).attr("v");
        let n = $(this).attr("n");
        let e = $(this).attr("e");
        let p = $(this).attr("p");

        $("#unameId").val(n);
        $("#uemailId").val(e);
        $("#uphoneId").val(p);
        $("#uid").val(id);
        
    });


    $("#updateSaveId").click(function(){

        let id = $("#uid").val();
        let nm = $("#unameId").val();
        let em = $("#uemailId").val();
        let ph = $("#uphoneId").val();

        mData = {sid: id, name: nm, email: em, phone: ph};
        $.ajax({
            url: 'update.php',
            method: 'POST',
            data: JSON.stringify(mData),
            success: function(res){
                if(res=="1"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Data has been Updated',
                        showConfirmButton: false,
                        timer: 2000
                      });
                      readData();
                      $('#exampleModal').modal('hide');
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: res,
                      })
                }
                //readData();
                //$(trThis).closest("tr").fadeOut();
            }
        });


    });
    
});