$('#searchCalls').on('submit',function(e){
        e.preventDefault();
        
        let date = $('#searchDate').val();
        let status = $('#searchStatus').val();
        let phone_number = $('#SearchPhone').val(); 
        let name = $('#SearchName').val();
        let city = $('#SearchCity').val();
        
        if(!date && !status && !phone_number && !name && !city){
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: "s'il vous plait, veuillez remplir au moins un champ !",
                showConfirmButton: true,
                timer: 5000
            });
        }else{
            $.ajax({
            url: 'search_calls/',
            type: "get",
            data:{
                date:date,
                status:status,
                phone_number:phone_number,
                name:name,
                city:city,
            },
            success:function(response)
            {   
                status = response.etat;
                msg = response.msg;
                
                if(status == 200){
                    searchCalls = response.leads;
                    //$('#tableSearchCalls').css('display','block');
                    $("#ResulttableSearchCalls").empty();
                    searchCalls.forEach(showSearchCalls);
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
            complete: function(){
                $('#loader').hide();
                $('.result').show();
            }
        });
        }
    });

  function showSearchCalls(element, index, array) {
        $('#ResulttableSearchCalls').append(`
            <tr>
                <td>${index + 1}</td>
                <td>${element.modify_date}</td>
                <td class="sec${element.lead_id}">`+ GetSecLength(element.lead_id) +`</td>
                <td>${element.status}</td>
                <td>${element.phone_number}</td>
                <td>${element.first_name}  ${element.last_name}</td>
                <td>${element.city}</td>
               
                <td>
                    <button onclick="ManualDial(${element.phone_number})" data-phone="${element.phone_number}" class="btn btn-sm btn-success "><i class="fa fa-phone"></i></button>
                    <button onclick="getContactInfo(${element.lead_id})" data-phone="${element.phone_number}" class="btn btn-sm btn-info "><i class="fa fa-eye"></i></button>
                </td>    
            </tr>
        `);        
    }
