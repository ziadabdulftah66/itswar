@extends('dashboard.layouts.app')
@section('style')
    <style>

        div.dataTables_wrapper div.dataTables_filter {
            text-align: left;
        }


    </style>
@endsection
@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="row align-items-center">


                    </div>
                </div>
                <!-- end page title -->
                @include('dashboard.layouts.includes.alerts.success')
                @include('dashboard.layouts.includes.alerts.errors')




                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">المدفوعات</h4>

                                <table id="datatable"  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">مرجع العملية</th>
                                                <th scope="col">الوصف</th>
                                                <th scope="col">التفاصيل</th>
                                                <th scope="col">تاريخ لانشاء</th>
                                                <th scope="col">الحاله</th>



                                                <th scope="col">حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                            @foreach ($payments as $payment)
                                            <tr>
                                                <?php $i++; ?>
                                                <th scope="row">{{$i}}</th>
                                                <td>{{$payment->payment_id}}</td>
                                                <td>{{$payment->description}}</td>
                                                <td>
                                                    @if($payment->type =='package')
                                                       <a href="{{route('Members.edit',$payment->detatils)}}"
                                                        class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                                    @elseif($payment->type =='fund')
                                                        <a href="{{route('fundingorder.edit',$payment->detatils)}}"
                                                           class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                                    @elseif($payment->type =='state')
                                                        <a href="{{route('front.state.show',$payment->detatils)}}"
                                                           class="btn btn-primary"><i class="fa fa-edit"></i> </a>
                                                    @else
                                                    --
                                                    @endif
                                                </td>
                                                <td>{{\Carbon\Carbon::parse($payment->created_at)->format('Y-m-d h:m:s')}}</td>
                                                <td>@if($payment->statues ==1)ناجحه@elseif($payment->statues ==2) فاشله@endif</td>

                                                                  <td>
                                                    <form method="post" action="{{route('Payment.destroy', $payment->id)}}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('هل تريد حذف هذا المدفوعة؟');"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->





    </div>
    <div class="rightbar-overlay"></div>
@endsection
@section('scripts')
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <script>

        $(document).ready(function(){

            $("#myTable").dataTable({
                "bStateSave": true,
                "fnStateSave": function (oSettings, oData) {
                    localStorage.setItem('dataTable2', JSON.stringify(oData));
                },
                "fnStateLoad": function (oSettings) {
                    return JSON.parse(localStorage.getItem('dataTable2'));
                },
                language: {
                    paginate: {

                        "previous": "السابق",
                        "next": "التالي",

                    },
                    search: 'بحث',
                    info: "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    lengthMenu: "أظهر _MENU_ مدخلات",
                    infoEmpty: "يعرض 0 إلى 0 من أصل 0 مُدخل",
                    loadingRecords: "جارٍ التحميل...",
                    zeroRecords: "لم يعثر على أية سجلات",
                    countFiltered: "عدد المفلتر",
                    emptyTable: "لا يوجد بيانات متاحة في الجدول",
                    infoFiltered: "(مرشحة من مجموع _MAX_ مُدخل)",


                },
            });

        });
    </script>
@endsection
