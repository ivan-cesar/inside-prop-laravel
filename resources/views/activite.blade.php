@extends('layouts.template')
@section('content')
   <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                                         <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="total-candidates cerapro-medium-cioccolato-20px">Historique des activités</h4>
                                  </div>
                                  <div>
                                    <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-export"></i>Exporter</button>
                                  </div>
                                </div>
                                    <div class="table-responsive  mt-1">
                                  <table class="table select-table" id="table_dmd">
                                    <thead>
                                      <tr>
                                        <th>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                              <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </th>
                                        <th>Action</th>
                                        <th>Navigateur</th>
                                        <th>Date/heure</th>
                                        <th>Url</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($activite as $act)
                                      <tr>
                                        <td>
                                          <div class="form-check form-check-flat mt-0">
                                            <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                          </div>
                                        </td>
                                        <td>
                                          <div class="d-flex ">
                                            <div>
                                              <h6>{{ucfirst($act->action)}}</h6>
                                            </div>
                                          </div>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($act->navigator)}}</h6>
                                        </td>
                                        <td>
                                          <h6>{{ucfirst($act->created_at)}}</h6>
                                        </td>
                                        <td>
                                           <h6>{{ucfirst($act->url)}}</h6>
                                        </td>
                                      </tr>
                                       @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection