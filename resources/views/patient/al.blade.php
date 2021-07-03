@extends('layouts.adm')

@section('title')
{{ __('sentence.All Patients') }}
@endsection

@section('content')

                  @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

   <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
               <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary w-75 p-2">{{ __('sentence.All Patients') }}</h6>
                </div>
                <div class="col-4">
                  <a href="{{ route('admin.patient.creat') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> {{ __('sentence.New Patient') }}</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>{{ __('sentence.Patient Name') }}</th>
                      <th class="text-center">{{ __('sentence.Phone') }}</th>
                      <th class="text-center">{{ __('sentence.Blood Group') }}</th>
                      <th class="text-center">{{ __('sentence.Date') }}</th>
                      <th class="text-center">{{ __('sentence.Actions') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($patients as $patient)
                    <tr>
                      <td>{{ $patient->id }}</td>
                      <td><a href="{{ url('admin_dashboard/patient/vie/'.$patient->id) }}"> {{ $patient->name }} </a></td>
                      <td class="text-center"> {{ $patient->Patient->phone }} </td>
                      <td class="text-center"> {{ $patient->Patient->blood }} </td>
                      <td class="text-center">{{ $patient->created_at->format('d M Y H:i') }}</td>
                      <td class="text-center">
                        <a href="{{ url('admin_dashboard/patient/vie/'.$patient->id) }}" class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('admin_dashboard/patient/edi/'.$patient->id) }}" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pen"></i></a>
                        <a href="{{ url('admin_dashboard/patient/delet/'.$patient->id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>

                      </td>
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection
