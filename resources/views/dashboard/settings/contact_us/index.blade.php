@extends('dashboard.layouts.app')
@section('style')
    <style>
        .dataTables_wrapper .dataTables_filter{
            text-align: right !important;
            width: 50% !important;
            display: inline !important;
        }
        .dataTables_wrapper .dataTables_length{
            text-align: left !important;

        }

        .dataTables_wrapper .dataTables_filter input {
            width: 250px ;
            margin-right:10px;
            height: 30px;
            margin-bottom: 12px;
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





                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">تواصل معنا</h4>

                                <table id="myTable"  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >

                                <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">الأسم</th>
                                                <th scope="col">الإيميل</th>
                                                <th scope="col">رقم الهاتف</th>
                                                <th scope="col">عرض</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">

                                            @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{$contact->id}}</td>
                                                <td>{{$contact->name}}</td>
                                                <td>{{$contact->email}}</td>
                                                <td>{{$contact->phone}}</td>

                                                @if ($contact->status == 0)
                                                <td><a href="{{route('contact_us.show', $contact->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                                @elseif ($contact->status == 1)
                                                <td><a href="{{route('contact_us.show', $contact->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
                                                @endif

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
