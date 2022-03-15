@extends('layouts.master')
@section('content')
 <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">Data Table</h6>
                  <p class="text-sm mb-20">
                    For basic styling—light padding and only horizontal
                    dividers—use the class table.
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th><h6>Tanggal</h6></th>
                          <th><h6>Waktu</h6></th>
                          <th><h6>Lokasi</h6></th>
                          <th><h6>Suhu Tubuh</h6></th>
                          <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                        <tr>
                          <td class="min-width">
                            <div class="lead">
                              <div class="lead-text">
                                <p>9 Maret 2022</p>
                              </div>
                            </div>
                          </td>
                          <td class="min-width">
                            <p><a href="#0">06.00</a></p>
                          </td>
                          <td class="min-width">
                            <p>Cibinong City Mall</p>
                          </td>
                          <td class="min-width">
                            <p>30 Celcius</p>
                          </td>
                          <td>
                            <div class="action">
                              <button class="text-danger">
                                <i class="lni lni-trash-can"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <!-- end table row -->
                        <tr>
                          <td class="min-width">
                            <div class="lead">
                              <div class="lead-text">
                                <p>9 Maret 2022</p>
                              </div>
                            </div>
                          </td>
                          <td class="min-width">
                            <p><a href="#0">06.00</a></p>
                          </td>
                          <td class="min-width">
                            <p>Cibinong City Mall</p>
                          </td>
                          <td class="min-width">
                            <p>30 Celcius</p>
                          </td>
                          <td>
                            <div class="action">
                              <button class="text-danger">
                                <i class="lni lni-trash-can"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <!-- end table row -->
                        <tr>
                          <td class="min-width">
                            <div class="lead">
                              <div class="lead-text">
                                <p>9 Maret 2022</p>
                              </div>
                            </div>
                          </td>
                          <td class="min-width">
                            <p><a href="#0">06.00</a></p>
                          </td>
                          <td class="min-width">
                            <p>Cibinong City Mall</p>
                          </td>
                          <td class="min-width">
                            <p>30 Celcius</p>
                          </td>
                          <td>
                            <div class="action">
                              <button class="text-danger">
                                <i class="lni lni-trash-can"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        
                        <!-- end table row -->
                      </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
@endsection