<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ciguatera Info</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- Javascript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased ">
        <div class="card">
                <h1>Welcome to the Ciguatera Reporting site</h1>
        </div>
        <div class="card mt-5">
            <form method="POST" action="/search">
                @csrf
                <div class="input-group">
                    <div class="form-outline">
                      <input type="search" id="location" name="location" class="form-control"  placeholder="Coordinates, Bay, Reef, Country"/>
                    </div>
                    <button type="submit" class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
            </form>
        </div>

        @if (isset($reports))
          <div class="card mt-5">
            <h2>Reports</h2>
            <table class="table">
              <thead>
                <th>Date</th>
                <th>Location</th>
                <th>Species</th>
            @foreach ($reports as $r)
              <tr>
                <td>{{$r->date}}</td>
                <td>{{$r->location}}</td>
                <td>{{$r->species}}</td>
              </tr>
            @endforeach
            </table>
          </div>
        @endif
        <div class="card mt-5">
            <h2>Report info</h2>
            <form method="POST" action="/report">
                @csrf
                <div class="input-group">
                    <div class="form-outline">
                      <input type="text" id="location" name="location"class="form-control" placeholder="Coordinates, Bay, Reef, Country"/>
                    </div>
                  </div>

                <div class="input-group">
                    <div class="form-outline">
                      <input type="text" id="species" name="species" class="form-control" placeholder="Species"/>
                    </div>
                </div>

                <div class="input-group">
                  <div class="form-outline">
                    <input type="date" id="date" name="date" class="form-control" />
                  </div>
              </div>

                <button type="submit" class="btn btn-primary">
                    Report Ciquatera Concentration
                  </button>
            </form>
        </div>
    </body>
</html>
