@extends('layouts.main')

@section('content-header')
@breadcrumb(
    [
        'title' => 'Create Goods Receipt',
        'items' => [
            'Dashboard' => route('index'),
            'Select Purchase Order' => route('goods_receipt.selectPO'),
            'Details' => '',
        ]
    ]
)
@endbreadcrumb
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <form id="create-gr" class="form-horizontal" method="POST" action="{{ route('goods_receipt.storeResource') }}">
                @csrf
                    @verbatim
                    <div id="pod">
                        <div class="col-sm-12 no-padding">
                            <div class="box-header p-t-0">
                                <div class="col-xs-12 col-lg-6 col-md-12 no-padding">    
                                    <div class="box-body no-padding">
                                        <div class="col-md-4 col-xs-4 no-padding">PO Number</div>
                                        <div class="col-md-8 col-xs-8 no-padding"><b>: {{ modelPO.number }}</b></div>
                                        
                                        <div class="col-md-4 col-xs-4 no-padding">Vendor</div>
                                        <div class="col-md-8 col-xs-8 no-padding"><b>: {{ modelPO.vendor.name }}</b></div>
                
                                        <div class="col-md-4 col-xs-4 no-padding">Address</div>
                                        <div class="col-md-8 col-xs-8 no-padding tdEllipsis"><b>: {{ modelPO.vendor.address }}</b></div>

                                        <div class="col-md-4 col-xs-4 no-padding">Phone Number</div>
                                        <div class="col-md-8 col-xs-8 no-padding"><b>: {{ modelPO.vendor.phone_number }}</b></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-3 col-md-12 no-padding">    
                                    <div class="box-body no-padding">
                                        <div class="col-md-4 col-lg-7 col-xs-12 no-padding"> GR Description : <textarea class="form-control" rows="3" v-model="description" style="width:310px"></textarea>
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
                                                <th width="40%">Resource Name</th>
                                                <th width="15%">Quantity</th>
                                                <th width="25%">Status</th>
                                                <th width="15%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(data,index) in datas">
                                                <td>{{ index+1 }}</td>
                                                <td>{{ data.resource_code }} - {{ data.resource_name }}</td>
                                                <td>{{ data.quantity }}</td>
                                                <td>{{ data.status }}</td>
                                                <td class="p-l-5" align="center">
                                                    <a class="btn btn-primary btn-xs" data-toggle="modal" href="#fill_detail" @click="openEditModal(data,index)">
                                                        FILL DETAIL
                                                    </a>
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
                        
                        <div class="modal fade" id="fill_detail">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title">Resource Detail Information</h4>
                                    </div>
                                    <div class="modal-body p-t-0">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="type" class="control-label">Category</label>
                                                <selectize v-model="editInput.category_id" :settings="categorySettings">
                                                    <option v-for="(resource_category, index) in resource_categories" :value="resource_category.id">{{ resource_category.name }} </option>
                                                </selectize>
                                            </div>
                                            
                                            <div v-show="editInput.category_id == '0'">
                                                <div class="col-sm-12">
                                                    <label for="code" class="control-label">Sub Con Code*</label>
                                                    <input type="text" id="code" v-model="editInput.code" class="form-control" disabled>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="sub_con_address" class="control-label">Sub Con Address*</label>
                                                    <input type="text" id="sub_con_address" v-model="editInput.sub_con_address" class="form-control" placeholder="Please Input Sub Con Address">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="sub_con_phone" class="control-label">Sub Con Contact Person*</label>
                                                    <input type="text" id="sub_con_phone" v-model="editInput.sub_con_phone" class="form-control" placeholder="Please Input Sub Con Contact Person">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="sub_con_competency" class="control-label">Sub Con Competency*</label>
                                                    <input type="text" id="sub_con_competency" v-model="editInput.sub_con_competency" class="form-control" placeholder="Please Input Sub Con Competency">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="description" class="control-label">Description</label>
                                                    <input type="text" id="description" v-model="editInput.description" class="form-control" placeholder="Please Input Description">
                                                </div>
                                            </div>

                                            <div v-show="editInput.category_id == '1'">
                                                <div class="col-sm-12">
                                                    <label for="code" class="control-label">Code*</label>
                                                    <input type="text" id="code" v-model="editInput.code" class="form-control" disabled>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="name" class="control-label">Name*</label>
                                                    <input type="text" id="name" v-model="editInput.name" class="form-control" placeholder="Please Input Resource Name">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="description" class="control-label">Description</label>
                                                    <input type="text" id="description" v-model="editInput.description" class="form-control" placeholder="Please Input Description">
                                                </div>
                                            </div>

                                            <div v-show="editInput.category_id == '2'">
                                                <div class="col-sm-12">
                                                    <label for="code" class="control-label">Code*</label>
                                                    <input type="text" id="code" v-model="editInput.code" class="form-control" disabled>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="brand" class="control-label">Brand*</label>
                                                    <input type="text" id="brand" v-model="editInput.brand" class="form-control" placeholder="Please Input Brand">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="description" class="control-label">Description</label>
                                                    <input type="text" id="description" v-model="editInput.description" class="form-control" placeholder="Please Input Description">
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 no-padding">
                                                        <label for="performance" class="control-label">Performance</label>
                                                    </div>
                                                    <div class="col-sm-3 no-padding p-r-10">
                                                        <input type="text" id="performance" v-model="editInput.performance" class="form-control" placeholder="Performance">

                                                    </div>
                                                    <div class="col-sm-3 no-padding">
                                                        <selectize v-model="editInput.performance_uom_id" :settings="uomSettings">
                                                            <option v-for="(data, index) in uom" :value="data.id">{{ data.unit }} </option>
                                                        </selectize>
                                                    </div>
                                                    <div class="col-sm-6 p-t-8">
                                                        Per Hour
                                                    </div>
                                                </div>
                                            </div>

                                            <div v-show="editInput.category_id == '3'">
                                                <div class="col-sm-12">
                                                    <label for="code" class="control-label">Code*</label>
                                                    <input type="text" id="code" v-model="editInput.code" class="form-control" disabled>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="brand" class="control-label">Brand*</label>
                                                    <input type="text" id="brand" v-model="editInput.brand" class="form-control" placeholder="Please Input Brand">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="description" class="control-label">Description</label>
                                                    <input type="text" id="description" v-model="editInput.description" class="form-control" placeholder="Please Input Description">
                                                </div>
                                                <div class="col-sm-12 p-t-7">
                                                    <label for="manufactured_date">Manufactured Date</label>
                                                    <input required autocomplete="off" type="text" class="form-control datepicker width100" name="manufactured_date" id="manufactured_date" placeholder="Manufactured Date">  
                                                </div>
                                                <div class="col-sm-12 p-t-7">
                                                    <label for="purchasing_date">Purchasing Date</label>
                                                    <input required autocomplete="off" type="text" class="form-control datepicker width100" name="purchasing_date" id="purchasing_date" placeholder="Purchasing Date" >  
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="purchasing_price" class="control-label">Purchasing Price</label>
                                                    <input type="text" id="purchasing_price" v-model="editInput.purchasing_price" class="form-control" placeholder="Please Input Purchasing Price">
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 no-padding">
                                                        <label for="lifetime" class="control-label">Life Time</label>
                                                    </div>
                                                    <div class="col-sm-3 no-padding p-r-10">
                                                        <input type="text" id="lifetime" v-model="editInput.lifetime" class="form-control" placeholder="Life Time">
                                                    </div>
                                                    <div class="col-sm-3 no-padding">
                                                        <selectize v-model="editInput.lifetime_uom_id" :settings="timeSettings">
                                                            <option value="1">Day(s)</option>
                                                            <option value="2">Month(s)</option>
                                                            <option value="3">Year(s)</option>
                                                        </selectize>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="cost_per_hour" class="control-label">Cost Per Hour (Rp.)</label>
                                                    <input type="text" id="cost_per_hour" v-model="editInput.cost_per_hour" class="form-control" placeholder="Please Input Cost Per Hour">
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="type" class="control-label">Depreciation Method</label>
                                                    <selectize v-model="editInput.depreciation_method" :settings="depreciationSettings">
                                                        <option v-for="(depreciation_method, index) in depreciation_methods" :value="depreciation_method.id">{{ depreciation_method.name }} </option>
                                                    </selectize>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-12 no-padding">
                                                        <label for="performance" class="control-label">Performance</label>
                                                    </div>
                                                    <div class="col-sm-3 no-padding p-r-10">
                                                        <input type="text" id="performance" v-model="editInput.performance" class="form-control" placeholder="Performance">
                                                    </div>
                                                    <div class="col-sm-3 no-padding">
                                                        <selectize v-model="editInput.performance_uom_id" :settings="uomSettings">
                                                            <option v-for="(data, index) in uom" :value="data.id">{{ data.unit }} </option>
                                                        </selectize>
                                                    </div>
                                                    <div class="col-sm-6 p-t-8">
                                                        Per Hour
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" @click.prevent="submitToTable()">SAVE</button>
                                    </div>
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
            if(title == 'Resource Name'){
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
        depreciation_methods : @json($depreciation_methods),
        resource_categories : @json($resource_categories),
        datas : @json($datas),
        modelPO :   @json($modelPO),
        uom :   @json($uom),
        description:"",
        editInput : {
            category_id : "",
            description : "",
            code : "",
            index : "",

            name:"",

            brand : "",
            performance : "",
            performance_uom_id : "",

            sub_con_address : "",
            sub_con_phone : "",
            sub_con_competency : "",

            manufactured_date : "",
            purchasing_date : "",
            purchasing_price : "",
            lifetime : "",
            lifetime_uom_id : "",
            depreciation_method : 0,
            cost_per_hour : "",
        },
        submittedForm :{},
        categorySettings: {
            placeholder: 'Please Select Category'
        },
        uomSettings: {
            placeholder: 'Please Select UOM'
        },
        timeSettings: {
            placeholder: 'Please Select Time'
        },
        depreciationSettings: {
            placeholder: 'Please Select Depreciation Method'
        },
        detailData:{},
        submitData:[]
    }

    var vm = new Vue({
        el : '#pod',
        data : data,
        mounted() {
            $('.datepicker').datepicker({
                autoclose : true,
            });
            $("#manufactured_date").datepicker().on(
                "changeDate", () => {
                    this.editInput.manufactured_date = $('#manufactured_date').val();
                }
            );
            $("#purchasing_date").datepicker().on(
                "changeDate", () => {
                    this.editInput.purchasing_date = $('#purchasing_date' ).val();
                }
            );
        },
        computed : {
            createOk: function(){
                let isOk = false;
                
                return isOk;
            },
        },
        methods : {
            submitToTable(){
                let category_id = this.editInput.category_id;
                this.detailData.category_id = category_id;
                this.detailData.code = this.editInput.code;
                this.detailData.description = this.editInput.description;
                this.detailData.index = this.editInput.index;
                this.detailData.resource_id = this.editInput.resource_id;

                if(category_id == 0){
                    this.detailData.sub_con_address = this.editInput.sub_con_address;
                    this.detailData.sub_con_phone = this.editInput.sub_con_phone;
                    this.detailData.sub_con_competency = this.editInput.sub_con_competency;
                }else if(category_id == 1){
                    this.detailData.name = this.editInput.name;
                }else if(category_id == 2){
                    this.detailData.brand = this.editInput.brand;
                    this.detailData.performance = this.editInput.performance;
                    this.detailData.performance_uom_id = this.editInput.performance_uom_id;
                }else if(category_id == 3){
                    this.detailData.brand = this.editInput.brand;
                    this.detailData.manufactured_date = this.editInput.manufactured_date;
                    this.detailData.purchasing_date = this.editInput.purchasing_date;
                    this.detailData.purchasing_price = this.editInput.purchasing_price;
                    this.detailData.lifetime = this.editInput.lifetime;
                    this.detailData.lifetime_uom_id = this.editInput.lifetime_uom_id;
                    this.detailData.cost_per_hour = this.editInput.cost_per_hour;
                    this.detailData.depreciation_method = this.editInput.depreciation_method;
                    this.detailData.performance = this.editInput.performance;
                    this.detailData.performance_uom_id = this.editInput.performance_uom_id;
                }
                let data = JSON.stringify(this.detailData);
                data = JSON.parse(data);
                this.submitData.push(data);
                this.detailData = {};

                // Update status
                this.datas[this.editInput.index].status = "Detail Completed";

                // Cleaning data
                this.editInput.category_id = '';
                this.editInput.code = '';
                this.editInput.description = '';
                this.editInput.index = '';
                if(category_id == 0){
                    this.editInput.sub_con_address = '';
                    this.editInput.sub_con_phone = '';
                    this.editInput.sub_con_competency = '';
                }else if(category_id == 1){
                    this.editInput.name = '';
                }else if(category_id == 2){
                    this.editInput.brand = '';
                    this.editInput.performance = '';
                    this.editInput.performance_uom_id = '';
                }else if(category_id == 3){
                    this.editInput.brand = '';
                    this.editInput.manufactured_date = '';
                    this.editInput.purchasing_date = '';
                    this.editInput.purchasing_price = '';
                    this.editInput.lifetime = '';
                    this.editInput.lifetime_uom_id = '';
                    this.editInput.cost_per_hour = '';
                    this.editInput.depreciation_method = '';
                    this.editInput.performance = '';
                    this.editInput.performance_uom_id = '';
                }

                iziToast.success({
                    title: 'Detail Fill Completed',
                    position: 'topRight',
                    displayMode: 'replace'
                });
            },
            submitForm(){
                this.submittedForm.resources = this.submitData;
                this.submittedForm.po_id = this.modelPO.id;
                this.submittedForm.description = this.description;

                let struturesElem = document.createElement('input');
                struturesElem.setAttribute('type', 'hidden');
                struturesElem.setAttribute('name', 'datas');
                struturesElem.setAttribute('value', JSON.stringify(this.submittedForm));
                form.appendChild(struturesElem);
                form.submit();
            },
            openEditModal(data,index){
                $('div.overlay').show();
                this.editInput.index = index;

                let status = 0;
                this.submitData.forEach(dataSubmit => {
                    if(dataSubmit.index == index){
                        this.editInput.category_id = dataSubmit.category_id;
                        this.editInput.code = dataSubmit.code;
                        this.editInput.description = dataSubmit.description;
                        this.editInput.index = dataSubmit.index;
                        this.editInput.resource_id = dataSubmit.resource_id;

                        if(dataSubmit.category_id == 0){
                            this.editInput.sub_con_address = dataSubmit.sub_con_address;
                            this.editInput.sub_con_phone = dataSubmit.sub_con_phone;
                            this.editInput.sub_con_competency = dataSubmit.sub_con_competency;
                        }else if(dataSubmit.category_id == 1){
                            this.editInput.name = dataSubmit.name;
                        }else if(dataSubmit.category_id == 2){
                            this.editInput.brand = dataSubmit.brand;
                            this.editInput.performance = dataSubmit.performance;
                            this.editInput.performance_uom_id = dataSubmit.performance_uom_id;
                        }else if(dataSubmit.category_id == 3){
                            this.editInput.brand = dataSubmit.brand;
                            this.editInput.manufactured_date = dataSubmit.manufactured_date;
                            this.editInput.purchasing_date = dataSubmit.purchasing_date;
                            this.editInput.purchasing_price = dataSubmit.purchasing_price;
                            this.editInput.lifetime = dataSubmit.lifetime;
                            this.editInput.lifetime_uom_id = dataSubmit.lifetime_uom_id;
                            this.editInput.cost_per_hour = dataSubmit.cost_per_hour;
                            this.editInput.depreciation_method = dataSubmit.depreciation_method;
                            this.editInput.performance = dataSubmit.performance;
                            this.editInput.performance_uom_id = dataSubmit.performance_uom_id;
                        }
                        status = 1;
                    }
                });

                if(status == 0){
                    let resource_code = data.resource_code;
                    this.editInput.resource_id = data.resource_id;
                    let po_number = this.modelPO.number;
                    let datas = [];
                    datas.push(resource_code,po_number);
                    datas = JSON.stringify(datas);

                    window.axios.get('/api/generateCodeGr/'+datas).then(({ data }) => {
                        this.editInput.code = data;

                        this.submitData.forEach(dataSubmit => {
                            if(dataSubmit.code == data){
                                let number = parseInt(data.substr(19)) + 1;
                                data = data.substr(0,19)+number;
                                this.editInput.code = data;
                            }
                        });
                    })
                    .catch((error) => {
                        iziToast.warning({
                            title: 'Please Try Again..',
                            position: 'topRight',
                            displayMode: 'replace'
                        });
                    })
                }
                $('div.overlay').hide();
            },
        },
        watch : {
            'this.editInput.category_id': function(newValue){

            }
        },
        created: function(){
           
        }
    });
</script>
@endpush
