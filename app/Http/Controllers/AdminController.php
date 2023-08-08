<?php

namespace App\Http\Controllers;

use App\Classes\Data;
use App\Classes\Queries;
use App\Classes\Response;
use App\Http\Requests\CreateDispatcherRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateDispatcherRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    //


    public function cylinderList()
    {
        $cylinders = Data::getCylinders();
        return $cylinders;
    }
    public function  addDispatcher(CreateDispatcherRequest $request)
    {

        try {
            Queries::createDispatcher($request);

            return Response::response(true, 'Dispatcher created successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }

    public function updateAdmin(Request $request)
    {
        try {
            Queries::updateAdmin($request);
            return Response::response(true, 'Admin updated successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }
    public function createAdmin(Request $request)
    {
        try {
            Queries::createAdmin($request);
            return Response::response(true, 'Admin created successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }

    public function updateDispatcher(UpdateDispatcherRequest $request)
    {
        try {
            Queries::updateDispatcher($request);
            return Response::response(true, 'Dispatcher updated successfully.');
        } catch (Exception $ex) {
            Log::debug($ex->getMessage());
            return Response::response(false, 'Something went wrong.');
        }
    }

    public function dispatcherList()
    {
        $dispatchers = Queries::listOfDispatchers();
        return $dispatchers;
    }
}
