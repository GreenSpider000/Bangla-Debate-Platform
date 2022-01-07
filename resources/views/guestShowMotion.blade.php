<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motion</title>
</head>
<body>

                    @foreach($motion as $motion)

                    
                    <div style="padding-top: 40px;" class="container">

                        <!-- show motion name -->
                        <h1 style="margin-bottom:20px;margin-top:5px;text-align: center;">
                            {{$motion->motionName}}
                        </h1>

                        <!-- show motion Description -->
                        <p style="margin-bottom:5px;margin-top:5px;text-align: center;">{{$motion->motionDescription}}</p>
                        <div style="margin-bottom:60px;margin-top:2px;text-align: center;">Motion creator: {{$motion->userName}}</div>
                        
                    </div>



                    <div class="container">
                        <div class="row">

                            <div class="col">

                                <h3 style="margin-bottom:30px;margin-top:5px;">Pros</h3>

                                @foreach ($pros as $pros)
                                <!-- show pros -->
                                <p>{{$pros->prosNumber}}</p>
                                <div>
                                   <b> <p>{{ ($pros->prosTitle) }}</p></b>
                                </div>

                                <div style="margin-bottom:25px;">
                                    <p>{{ ($pros->prosDescription) }}</p>
                                </div>

                                @endforeach

                            </div>

                            <div class="col">

                                <h3 style="margin-bottom:30px;margin-top:5px;">Cons</h3>

                                @foreach ($cons as $cons)
                                <p>{{$cons->consNumber}}</p>
                                <div>
                                    <b><p>{{ ($cons->consTitle) }}</p></b>
                                </div>

                                <div>
                                    <p>{{ ($cons->consDescription) }}</p>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                    @endforeach

                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>