@extends('layouts.main')

@section('content-header')
@if($route == "/goods_return")
    @breadcrumb(
        [
            'title' => 'Create Goods Receipt',
            'items' => [
                'Dashboard' => route('index'),
                'Select Purchase Order' => route('goods_return.selectPO'),
                'Details' => '',
            ]
        ]
    )
    @endbreadcrumb
@elseif($route == "/goods_return_repair")
    @breadcrumb(
        [
            'title' => 'Create Goods Receipt',
            'items' => [
                'Dashboard' => route('index'),
                'Select Purchase Order' => route('goods_return_repair.selectPO'),
                'Details' => '',
            ]
        ]
    )
    @endbreadcrumb
@endif
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                @if($route == "/goods_return")
                    <form id="create-gr" class="form-horizontal" method="POST" action="{{ route('goods_return.storePO') }}">
                @elseif($route == "/goods_return_repair")
                    <form id="create-gr" class="form-horizontal" method="POST" action="{{ route('goods_return_repair.storePO') }}">
                @endif
                @csrf
                    @verbatim
                    <div id="pod">
                        <div class="col-sm-12 no-padding">
                            <div class="box-header">
                                <div class="col-xs-12 col-lg-6 col-md-12 no-padding">    
                                    <div class="box-body no-padding">
                                        <div class="col-md-4 col-xs-4 no-padding">GR Number</div>
                                        <div class="col-md-8 col-xs-8 no-padding"><b>: {{ modelPO.number }}</b></div>
                                        
                                        <div class="col-md-4 col-xs-4 no-padding">Vendor</div>
                                        <div class="col-md-8 col-xs-8 no-padding"><b>: {{ vendor.name }}</b></div>
                
                                        <div class="col-md-4 col-xs-4 no-padding">Address</div>
                                        <div class="col-md-8 col-xs-8 no-padding tdEllipsis"><b>: {{ vendor.address }}</b></div>

                                        <div class="col-md-4 col-xs-4 no-padding">Phone Number</div>
                                        <div class="col-md-8 col-xs-8 no-padding"><b>: {{ vendor.phone_number }}</b></div>

                                        <div class="col-md-4 col-xs-4 no-padding">GR Description</div>
                                        <div class="col-md-8 col-xs-8 no-padding tdEllipsis" data-container="body" data-toogle="tooltip" :title="tooltipText(modelPO.description)"><b>: {{ modelPO.description }}</b></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-3 col-md-12 no-padding">    
                                    <div class="box-body no-padding">
                                        <div class="col-md-4 col-lg-7 col-xs-12 no-padding">Goods Return Description : <textarea class="form-control" rows="3" v-model="description" style="width:310px"></textarea>
                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <table class="table table-bordered tablePagingVue tableFixed">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="30%">Material Name</th>
                                                <th width="30%">Material Description</th>
                                                <th width="15%">Quantity</th>
                                                <th width="15%">Return Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(POD,index) in modelPOD">
                                                <td>{{ index+1 }}</td>
                                                <td>{{ POD.material.code }} - {{ POD.material.name }}</td>
                                                <td>{{ POD.material.description }}</td>
                                                <td>{{ POD.quantity - POD.received - POD.returned }} </td>
                                                <td class="tdEllipsis no-padding">
                                                    <input class="form-control width100" v-model="POD.returned_temp" placeholder="Please Input Returned Quantity">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 p-t-10">
                                    <button @click.prevent="submitForm" class="btn btn-primary pull-right" :disabled="createOk">CREATE</button>
                                </div>
                            </div>
                        </div>
                    @endverbatim
                </form>
        </div><!-- /.box-body -->
            <div class="overlay">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
        </div> <!-- /.box -->
    </div> <!-- /.col-xs-12 -->
</div> <!-- /.row -->
@endsection

@push('script')
<script>
    const form = document.querySelector('form#create-gr');

    $(document).ready(function(){
        $('div.overlay').hide();

        $('.tablePagingVue thead tr').clone(true).appendTo( '.tablePagingVue thead' );
        $('.tablePagingVue thead tr:eq(1) th').addClass('indexTable').each( function (i) {
            var title = $(this).text();
            if(title == 'Material Name' || title == 'Storage Location'){
                $(this).html( '<input class="form-control width100" type="text" placeholder="Search '+title+'"/>' );
            }else{
                $(this).html( '<input disabled class="form-control width100" type="text"/>' );
            }

            $( 'input', this ).on( 'keyup change', function () {
                if ( tablePagingVue.column(i).search() !== this.value ) {
                    tablePagingVue
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            });
        });

        var tablePagingVue = $('.tablePagingVue').DataTable( {
            orderCellsTop   : true,
            paging          : false,
            autoWidth       : false,
            lengthChange    : false,
            info            : false,
        });
    });

    var data = {
        modelPOD : @json($modelPOD),
        modelPO :   @json($modelPO),
        vendor : @json($vendor),
        description:"",
        submittedForm :{},
    }

    var vm = new Vue({
        el : '#pod',
        data : data,
        computed : {
            createOk: function(){
                let isOk = true;
                this.modelPOD.forEach(POD => {
                    if((POD.returned_temp+"").replace(/,/g , '') > 0){
                        isOk = false;
                    }
                });
                return isOk;
            }
        },
        methods : {
            tooltipText($text){
                return $text;
            },
            changeText(){
                if(document.getElementsByClassName('tooltip-inner')[0]!= undefined){
                    if(document.getElementsByClassName('tooltip-inner')[0].innerHTML != modelPO.vendor.address ){
                        document.getElementsByClassName('tooltip-inner')[0].innerHTML= modelPO.vendor.address;    
                    }
                }
            }, 
            
            submitForm(){
                var data = this.modelPOD;
                data = JSON.stringify(data)
                data = JSON.parse(data)

                data.forEach(POD => {
                    POD.quantity = POD.quantity.replace(/,/g , ''); 
                    POD.returned_temp = parseInt(POD.returned_temp);     
                });

                this.submittedForm.POD = data;
                this.submittedForm.purchase_order_id = this.modelPO.id;
                this.submittedForm.description = this.description;

                let struturesElem = document.createElement('input');
                struturesElem.setAttribute('type', 'hidden');
                struturesElem.setAttribute('name', 'datas');
                struturesElem.setAttribute('value', JSON.stringify(this.submittedForm));
                form.appendChild(struturesElem);
                form.submit();
            }
        },
        watch : {
            modelPOD:{
                handler: function(newValue) {
                    var data = newValue;
                    data.forEach(POD => {
                        if((parseInt((POD.quantity+"").replace(/,/g , '')) - parseInt((POD.received+"").replace(/,/g , ''))  - parseInt((POD.returned+"").replace(/,/g , ''))) < parseInt((POD.returned_temp+"").replace(/,/g , ''))){
                            POD.returned_temp = POD.quantity - POD.received - POD.returned;
                            iziToast.warning({
                                title: 'Cannot input more than received quantity..',
                                position: 'topRight',
                                displayMode: 'replace'
                            });
                        }
                        POD.returned_temp = (POD.returned_temp+"").replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");            
                    });
                },
                deep: true
            },
        },
        created: function(){
            this.modelPOD.forEach(POD => {
                POD.quantity = (POD.quantity+"").replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });
        },
    });
</script>
@endpush
