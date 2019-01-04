@extends('layouts.admin')

@section('content')

    <header class="page-header">
        <h2>Manage Property Contacts</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="javascript:void(0);">
                        <i class="fa fa-home"></i>
                    </a>
                </li>

                <li><span>Properties</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"></a>
        </div>
    </header>

    @if (Session::has('message'))
        <div class="alert alert-success">
            <strong> {{ Session::get('message') }}</strong>
        </div>
    @endif


    <section class="panel">
        <header class="panel-heading">

            <h2 class="panel-title">Manage Property Contacts</h2>
        </header>
        <div class="panel-body">
            <table class="table table-no-more table-bordered table-striped mb-none">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Property Name</th>
                    <th>Contact Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th class="hidden-xs hidden-sm">Created</th>

                </tr>
                </thead>
                <tbody>

                @foreach($property_contacts as $key=> $contact)

                    <tr>
                        <td data-title="Id">{{$contact->id}}</td>
                        <td data-title="Name" >{{$contact->property->name}}</td>
                        <td data-title="Name" >{{$contact->name}}</td>
                        <td data-title="Name" >{{$contact->email}}</td>
                        <td data-title="Name" >{{$contact->phone}}</td>
                        <td data-title="Name" >{{$contact->subject}}</td>
                        <td data-title="Name" >{{$contact->message}}</td>
                        <td data-title="Created">{{date('d-M-Y',strtotime($contact->created_at))}}</td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="pull-right">{{ $property_contacts->links() }}</div>
    </section>
    <!-- end: page -->


@endsection

@section('scripts')


@endsection
