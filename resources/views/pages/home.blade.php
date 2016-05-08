@extends('layout')

@section('active-nav')
<li class="active"><a href="/">Home</a></li>
<li><a href="/about">About</a></li>
<li><a href="/contact">Contact</a></li>
@stop

@section('content')

    <div class="container">

      <div class="row"> <!-- intro -->
        <div class="col-md-8 col-md-offset-2 text-center">
          <h1>AirDnD - Property Search Engine</h1>
          <p class="lead">Your one stop search engine for property lookups catered to your preferences.</p>
        </div>
      </div> <!-- end intro -->

      <div class="row"> <!-- search form -->
        <div class="col-md-8 col-md-offset-2">

          <form id="searchForm" action="/properties/search">
            <!-- first group -->
           <div class="form-group">
              <label for="propertyName">Name</label>
              <input type="text" class="form-control" id="propertyName" placeholder="Search by property name..." name="name">
           </div>
           <!-- second group -->
           <div class="form-group">
             <div class="row">
               <div class="col-md-4">
                 <label for="bedrooms">Bedrooms</label>
                 <select class="form-control" id="bedrooms" name="bedrooms">
                   <option value="" selected="selected">--</option>
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                 </select>
               </div>
               <div class="col-md-4">
                 <label for="bathrooms">Bathrooms</label>
                 <select class="form-control" id="bathrooms" name="bathrooms">
                   <option value="" selected="selected">--</option>
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                 </select>
               </div>
               <div class="col-md-4">
                 <label for="garages">Garages</label>
                 <select class="form-control" id="garages" name="garages">
                   <option value="" selected="selected">--</option>
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                 </select>
               </div>
             </div>
           </div>
           <!-- third group -->
           <div class="form-group">
             <div class="row">
               <div class="col-md-4">
                 <label for="storeys">Storeys</label>
                 <select class="form-control" id="storeys" name="storeys">
                   <option value="" selected="selected">--</option>
                   <option value="1">1</option>
                   <option value="2">2</option>
                 </select>
               </div>
               <div class="col-md-4">
                 <label for="priceMin">Price (Min)</label>
                 <select class="form-control" id="priceMin" name="min">
                   <option value="">--</option>
                   <option value="100000" selected="selected">$100,000</option>
                   <option value="200000">$200,000</option>
                   <option value="300000">$300,000</option>
                   <option value="400000">$400,000</option>
                   <option value="500000">$500,000</option>
                 </select>
               </div>
               <div class="col-md-4">
                 <label for="priceMax">Price (Max)</label>
                 <select class="form-control" id="priceMax" name="max">
                   <option value="">--</option>
                   <option value="100000">$100,000</option>
                   <option value="200000">$200,000</option>
                   <option value="300000">$300,000</option>
                   <option value="400000">$400,000</option>
                   <option value="500000">$500,000</option>
                   <option value="600000" selected="selected">$600,000</option>
                 </select>
               </div>
             </div>
           </div>
           <!-- fourth group -->
           <div class="form-group">
             <button type="submit" class="btn btn-primary btn-lg">Search</button>
             <img src="/img/preloader.gif" alt="loading..." style="margin-left:10px" class="hidden" id="preloader" />
           </div>
          </form>

        </div>
      </div> <!-- end search form -->

      <div class="row hidden" id="resultsTableContainer"> <!-- search results -->
        <div class="col-md-8 col-md-offset-2">
          <table class="table table-bordered" id="resultsTable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Garages</th>
                <th>Storeys</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div> <!-- end search results -->

      <div class="row hidden" id="errorMessage">
        <div class="col-md-8 col-md-offset-2">
          <div class="alert alert-danger" role="alert">No properties found, please try a new search.</div>
        </div>
      </div>

    </div><!-- /.container -->

@stop
