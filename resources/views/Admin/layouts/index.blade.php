@extends('Admin.layouts.hr-base')
@section('css')
<style>

    .modal-dialog {
        width: 1300px;
        margin: 30px auto;
    }
.multiselect {
  width: auto;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}
#checkboxesCampaigns {
  display: none;
  border: 1px #dadada solid;
}

#checkboxesCampaigns label {
  display: block;
}

#checkboxesCampaigns label:hover {
  background-color: #1e90ff;
}
#checkboxeslists {
  display: none;
  border: 1px #dadada solid;
}

#checkboxeslists label {
  display: block;
}

#checkboxeslists label:hover {
  background-color: #1e90ff;
}


.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  border-bottom: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">


@endsection
@section('title')
Dashboard Agent
@endsection
@section('ajouter')

<div class="page-header d-xl-flex d-block">
    <div class="page-leftheader">
        <div class="page-title">Export Lists des prospects</div>
    </div>
    
</div>
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="card-title">Export Les statistiques des agents</h4>
                </div>
                <div class="card-body">
                    @if(session()->has('error'))
                        <div class="alert alert-danger text-center" id="msg">
                        {{ session()->get('error') }}
                        </div>
                    @endif
                    <form id="FormSelectAgent">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" name="campaign" id="campaign">
                                        <option selected value="">--chosir la compagne --</option>
                                            @isset($campaigns)
                                            @foreach($campaigns as $compagne)
                                                <option value="{{$compagne->campaign_id}}">{{$compagne->campaign_name}}</option>
                                            @endforeach
                                            @endisset
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="date" id="date">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <input type="checkbox" class="form-control" name="stat_agent" id="stat_agent" style="width: 20px;height: 20px;"> Stat detailée  -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-7">
                                 <button type="submit" class="btn btn-info"><i class="fa fa-file-excel-o"></i> Afficher Résultat</button>
                            </div>
                        </div>
                        <!-- <div class="form-group" style="display:none" id="all_contacts">
                            <input type="date" class="form-control" name="date_injection"><br>

                            <button type="submit" class="btn btn-info"><i class="fa fa-file-excel-o"></i> Export all contact</button>
                        </div> -->
                    </form> 

                    <div class="col-md-12 text-center" id="loader" style="display:none">
                        <div class="card">
                            <div class="card-body">
                                <div class="dimmer active">
                                    <div class="sk-circle">
                                        <div class="sk-circle1 sk-child"></div>
                                        <div class="sk-circle2 sk-child"></div>
                                        <div class="sk-circle3 sk-child"></div>
                                        <div class="sk-circle4 sk-child"></div>
                                        <div class="sk-circle5 sk-child"></div>
                                        <div class="sk-circle6 sk-child"></div>
                                        <div class="sk-circle7 sk-child"></div>
                                        <div class="sk-circle8 sk-child"></div>
                                        <div class="sk-circle9 sk-child"></div>
                                        <div class="sk-circle10 sk-child"></div>
                                        <div class="sk-circle11 sk-child"></div>
                                        <div class="sk-circle12 sk-child"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 result"><br>
                        <div class="portlet-title" style="background-color:#0dcaf0;padding:7px">
                            <div class="caption caption-md" style="color:white">
                                <i class="fa fa-list"></i> 
                                <span class="caption-subject bold">Statistique personalisée</span>
                            </div>
                        </div>
                        <div class="portlet-body flip-scroll">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>AGENT</th>
                                        <th>WAIT</th>
                                        <th>DISPO</th>
                                        <th>PROD</th>
                                        <th>CALLS</th>
                                        <th>SALE</th>
                                        <th>CU</th>
                                    </tr>
                                </thead>
                                <tbody id="agentsStat">
                                    
                                    
                                    
                                  
                                
                                </tbody>
                                <tfoot id="TotalAgentStat">
                                    
                                    
                                    
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="card-title">Export Lists des prospects</h4>
                </div>
                <div class="card-body">
                    <span class="text-red" style="font-size: 11px;">Veuillez selectionner un ou plusieurs lists ! </span>
                    @if(session()->has('error'))
                        <div class="alert alert-danger text-center" id="msg">
                        {{ session()->get('error') }}
                        </div>
                    @endif
                    <form action="{{route('ExportList')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="multiselect" style="z-index:100">
                                        <div class="selectBox" onclick="showCheckboxesList()">
                                          <select class="form-control">
                                            <option>Select an option</option>
                                          </select>
                                          <div class="overSelect"></div>
                                        </div>
                                        <div id="checkboxeslists">
                                            @foreach($lists as $campaign => $list)
                                                
                                                <label for="{{$list->list_id}}">
                                                    <input type="checkbox" name="list[]" id="{{$list->list_id}}" value="{{$list->list_id}}" /> {{$list->list_name}}
                                                </label>
                                               
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-froup">
                                    <input type="date" class="form-control" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="checkbox" class="form-control" name="is_cu" style="width: 20px;height: 20px;"> CU ?  <span class="text-danger" style="font-size:12px">Tout les appels >= 3min</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-7">
                                 <button type="submit" class="btn btn-info"><i class="fa fa-file-excel-o"></i> Exporter La Liste</button>
                            </div>
                        </div>
                        <!-- <div class="form-group" style="display:none" id="all_contacts">
                            <input type="date" class="form-control" name="date_injection"><br>

                            <button type="submit" class="btn btn-info"><i class="fa fa-file-excel-o"></i> Export all contact</button>
                        </div> -->
                    </form> 
                </div>
            </div>
        </div>

    </div>



<script src="{{asset('assets/admin/js/jquery-2.1.1.min.js')}}"></script>
<script>
    var expanded = false;

    function showCheckboxes() {
      var checkboxes = document.getElementById("checkboxes");
      
      if (!expanded) {
        checkboxes.style.display = "block";
        //$(".campaigns").css('display','block');
        expanded = true;
      } else {
        checkboxes.style.display = "none";
        //$(".campaigns").css('display','none');
        expanded = false;
      }
    }

    function showCheckboxesCampaign() {
      var checkboxesCampaigns = document.getElementById("checkboxesCampaigns");
      
      if (!expanded) {
        checkboxesCampaigns.style.display = "block";
        //$(".campaigns").css('display','block');
        expanded = true;
      } else {
        checkboxesCampaigns.style.display = "none";
        //$(".campaigns").css('display','none');
        expanded = false;
      }
    }
    function showCheckboxesList() {
      var checkboxeslists = document.getElementById("checkboxeslists");
      
      if (!expanded) {
        checkboxeslists.style.display = "block";
        //$(".campaigns").css('display','block');
        expanded = true;
      } else {
        checkboxeslists.style.display = "none";
        //$(".campaigns").css('display','none');
        expanded = false;
      }
    }


     $('#FormSelectAgent').on('submit',function(e){
        e.preventDefault();


        
        var day = $('#date').val();
        var campaign = $('#campaign').val();
        //var campaigns = $('#campaigns').val();
        //alert(campaigns);
        

        
        if(day.length == 0){
            //alert(day == ''); 
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: response.msg,
                showConfirmButton: true,
                timer: 1500
            });
        }else if(day.length > 0){
            //alert('eeeee')
            $('#loader').show();
            $('.result').hide();
            $.ajax({
                url: 'new_show_stat_agents/',
                type: "post",
                data:{
                        "_token":"{{csrf_token()}}",
                        //ids:ids,
                        //campaignsids:campaignsids,
                        date:day,
                        campaign:campaign,
                    },
                success:function(response)
                {   
                    
                    status = response.etat;
                    //alert(status);
                    //console.log(totalAgentInfo);
                    if(status == 200){
                        agents = response.agents;
                        totalAgentInfo = response.totalAgentInfo;
                        console.log(totalAgentInfo);
                        $('#agentsStat').empty();
                        $('#TotalAgentStat').empty();
                        agents.forEach(element =>{                              
                            $('#agentsStat').append(`
                                <tr style="padding:5px">
                                    <td>${element.Agent}</td>
                                    <td>${element.Datente}</td>
                                    <td>${element.DTraitement}</td>
                                    <td>${element.Dproduction}</td>
                                    <td>${element.appels}</td>
                                    <td>${element.Sale}</td>
                                    <td>${element.CU}</td>
                                </tr>
                            `); 
                        });
                        $('#TotalAgentStat').append(`
                                <tr style="padding:5px">
                                    <td>TOTAL</td>
                                    <td>${totalAgentInfo.Dat}</td>
                                    <td>${totalAgentInfo.Dt}</td>
                                    <td>${totalAgentInfo.Dprod}</td>
                                    <td>${totalAgentInfo.appels}</td>
                                    <td>${totalAgentInfo.Sale}</td>
                                    <td>${totalAgentInfo.CU}</td>
                                </tr>
                            `); 
                    }
                        
                },
                complete: function(response){

                    $('#loader').hide();
                    $('.result').show();
                }
            });
        }
    });   
</script>
<script type="text/javascript">
    
</script>
<script>
$(document).ready(function () {
    $('#example').DataTable();
});
$('.type').on('change',function(){
    if(this.value == 1){
        $('#contacts').css('display','none');
        $('#all_contacts').css('display','block');
    }else{
        $('#all_contacts').css('display','none');
        $('#contacts').css('display','block');
    }
})
</script>





@endsection
