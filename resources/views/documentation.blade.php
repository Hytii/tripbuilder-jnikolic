@extends('layout')
@section('content')
    <div class="full-height documentation">
        <div class="menu">
            <ul>
                <li><a href="#airports">Airports</a></li>
                <li><a href="#trips">Trips</a></li>
                <li><a href="#flights">Flights</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="title m-b-md">
                API Documentation
            </div>
            <section id="airports">
                <h2>Airports</h2>
                <div class="endpoint">
                    <div class="endpoint-uri">
                        /api/airports<span class="endpoint-method">GET</span>
                    </div>
                    <div class="endpoint-description">
                        Retrieve all airports
                    </div>
                    <div class="endpoint-input">
                        <h5>Input:</h5>
                        <code>None</code>
                    </div>
                    <div class="endpoint-output">
                        <h5>Output:</h5>
                        <code>
                            [{"name":"108 Mile Ranch","code":"ZMH"},{"name":"39th Street Ferry","code":"XNY"},{"name":"4
                            de Fevereiro","code":"LAD"}]
                        </code>
                    </div>
                </div>
            </section>
            <section id="trips">
                <h2>Trips</h2>
                <div class="endpoint">
                    <div class="endpoint-uri">
                        /api/trips<span class="endpoint-method">GET</span>
                    </div>
                    <div class="endpoint-description">
                        Retrieve all Trips
                    </div>
                    <div class="endpoint-input">
                        <h5>Input:</h5>
                        <code>None</code>
                    </div>
                    <div class="endpoint-output">
                        <h5>Output:</h5>
                        <code>
                            [
                            {
                            "number":"TR1234"
                            },
                            {
                            "number":"TR1235"
                            }
                            ]
                        </code>
                    </div>
                </div>
                <div class="endpoint">
                    <div class="endpoint-uri">
                        /api/trips/{trip.number}<span class="endpoint-method">GET</span>
                    </div>
                    <div class="endpoint-description">
                        Retrieve specific trip information
                    </div>
                    <div class="endpoint-input">
                        <h5>Input:</h5>
                        <code>None</code>
                    </div>
                    <div class="endpoint-output">
                        <h5>Output:</h5>
                        <code>
                            {
                            "number":"TR1234"
                            }
                        </code>
                    </div>
                </div>
                <div class="endpoint">
                    <div class="endpoint-uri">
                        /api/trips<span class="endpoint-method">POST</span>
                    </div>
                    <div class="endpoint-description">
                        Store a new trip
                    </div>
                    <div class="endpoint-input">
                        <h5>Input:</h5>
                        <code>
                            <ul>
                                <li>Number: String (ex: TR1234)</li>
                            </ul>
                        </code>
                    </div>
                    <div class="endpoint-output">
                        <h5>Output:</h5>
                        <code>
                            {
                            "number": "TR1234"
                            }
                        </code>
                    </div>
                </div>
                <div class="endpoint">
                    <div class="endpoint-uri">
                        /api/trips/{trip.number}<span class="endpoint-method">PATCH</span>
                    </div>
                    <div class="endpoint-description">
                        Update trip information
                    </div>
                    <div class="endpoint-input">
                        <h5>Input:</h5>
                        <code>
                            <ul>
                                <li>Number: String (ex: TR1235)</li>
                            </ul>
                        </code>
                    </div>
                    <div class="endpoint-output">
                        <h5>Output:</h5>
                        <code>
                            {
                            "number": "TR1235"
                            }
                        </code>
                    </div>
                </div>
                <div class="endpoint">
                    <div class="endpoint-uri">
                        /api/trips/{trip.number}<span class="endpoint-method">DELETE</span>
                    </div>
                    <div class="endpoint-description">
                        Destroy a trip
                    </div>
                    <div class="endpoint-input">
                        <h5>Input:</h5>
                        <code>
                            None
                        </code>
                    </div>
                    <div class="endpoint-output">
                        <h5>Output:</h5>
                        <code>
                            Http response 200
                        </code>
                    </div>
                </div>
            </section>
            <section id="flights">
                <h2>Flights</h2>
                <div class="endpoint">
                    <div class="endpoint-uri">
                        /api/trips/{trip.number}/flights<span class="endpoint-method">GET</span>
                    </div>
                    <div class="endpoint-description">
                        Retrieve flights collection for specified trip
                    </div>
                    <div class="endpoint-input">
                        <h5>Input:</h5>
                        <code>None</code>
                    </div>
                    <div class="endpoint-output">
                        <code>
                            [
                            {
                            "number": "FL8736",
                            "from": {
                            "name": "Arrabury",
                            "code": "AAB"
                            },
                            "to": {
                            "name": "Apalachicola Regional",
                            "code": "AAF"
                            }
                            },
                            {
                            "number": "FL6773",
                            "from": {
                            "name": "Chicago FSS",
                            "code": "CHI"
                            },
                            "to": {
                            "name": "Pierre Elliott Trudeau International",
                            "code": "YUL"
                            }
                            }
                            ]
                        </code>
                    </div>
                </div>
                <div class="endpoint">
                    <div class="endpoint-uri">
                        /api/trips/{trip.number}/flights/{flight.number}<span class="endpoint-method">GET</span>
                    </div>
                    <div class="endpoint-description">
                        Retrieve specific flight information
                    </div>
                    <div class="endpoint-input">
                        <h5>Input:</h5>
                        <code>None</code>
                    </div>
                    <div class="endpoint-output">
                        <h5>Output:</h5>
                        <code>
                            {
                            "number": "FL8736",
                            "from": {
                            "name": "Arrabury",
                            "code": "AAB"
                            },
                            "to": {
                            "name": "Apalachicola Regional",
                            "code": "AAF"
                            }
                            }
                        </code>
                    </div>
                </div>
                <div class="endpoint">
                    <div class="endpoint-uri">/api/trips/{trip.number}/flights<span class="endpoint-method">POST</span>
                    </div>
                    <div class="endpoint-description">
                        Store a new flight for specific trip
                    </div>
                    <div class="endpoint-input">
                        <h5>Input:</h5>
                        <code>
                            <ul>
                                <li>from: String, airport number the flight is from</li>
                                <li>to: String, airport number the flight is to</li>
                            </ul>
                        </code>
                    </div>
                    <div class="endpoint-output">
                        <h5>Output:</h5>
                        <code>
                            {
                            "number": "FL6773",
                            "from": {
                            "name": "Chicago FSS",
                            "code": "CHI"
                            },
                            "to": {
                            "name": "Pierre Elliott Trudeau International",
                            "code": "YUL"
                            }
                            }
                        </code>
                    </div>
                </div>
                <div class="endpoint">
                    <div class="endpoint-uri">/api/trips/{trip.number}/flights/{flight.number}<span
                                class="endpoint-method">DELETE</span></div>
                    <div class="endpoint-description">
                        Destroy specified flight
                    </div>
                    <div class="endpoint-input">
                        <h5>Input:</h5>
                        <code>None</code>
                    </div>
                    <div class="endpoint-output">
                        <h5>Output:</h5>
                        <code>
                            Http response 200
                        </code>
                    </div>
                </div>
            </section>
            <div class="links">
                <a href="https://github.com/jeremynikolic/tripbuilder">Github</a>
            </div>
        </div>
    </div>
@endsection