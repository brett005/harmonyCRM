$('#SearchLead').on('submit',function(e){
        e.preventDefault();
        
        let first_name = $('#toSearch_first_name').val();
        let last_name = $('#toSearch_last_name').val();
        let phone_number = $('#toSearch_phone').val(); 
        let email = $('#toSearch_email').val();
    
        
        if(!first_name && !last_name && !phone_number && !email){
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: "s'il vous plait, veuillez remplir au moins un champ !",
                showConfirmButton: true,
                timer: 5000
            });
        }else{
            $.ajax({
            url: 'search_lead/',
            type: "get",
            data:{
                first_name:first_name,
                last_name:last_name,
                phone_number:phone_number,
                email:email,
            },
            success:function(response)
            {   
                status = response.etat;
                msg = response.msg;
                
                if(status == 200){
                    lead = response.lead;
                    //console.log(lead);
                    document.getElementById('search_first_name').value = '';
                    document.getElementById('search_last_name').value = '';
                    document.getElementById('search_adr1').value = '';
                    document.getElementById('search_city').value = '';
                    document.getElementById('search_postal_code').value = '';
                    document.getElementById('search_phone_number').value = '';
                    document.getElementById('search_alt_phone').value = '';
                    document.getElementById('search_email').value = '';
                    document.getElementById('search_commentaire').value = '';

                    document.getElementById('search_first_name').value = lead.first_name ;
                    document.getElementById('search_last_name').value = lead.last_name ;
                    document.getElementById('search_adr1').value = lead.address1 ;
                    document.getElementById('search_city').value = lead.city ;
                    document.getElementById('search_postal_code').value = lead.postal_code ;
                    document.getElementById('search_phone_number').value = lead.phone_number ;
                    document.getElementById('search_alt_phone').value = lead.alt_phone ;
                    document.getElementById('search_email').value = lead.email ;
                    document.getElementById('search_commentaire').value = lead.comments;
                    $('#manDialFile').empty()
                    $('#manDialFile').append(`<button class="btn btn-success" onclick=ManualDial(${lead.phone_number})><i class="fa fa-phone"></i> Appeler</button>`); /// add url to button send
                }else if(status == 401){
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: msg,
                        showConfirmButton: true,
                        timer: 1000
                    });
                }
                    
                },
        });
        }
    });

function Effacer(){
    document.getElementById('search_first_name').value = '';
    document.getElementById('search_last_name').value = '';
    document.getElementById('search_adr1').value = '';
    document.getElementById('search_city').value = '';
    document.getElementById('search_postal_code').value = '';
    document.getElementById('search_phone_number').value = '';
    document.getElementById('search_alt_phone').value = '';
    document.getElementById('search_email').value = '';
    document.getElementById('search_commentaire').value = '';

}