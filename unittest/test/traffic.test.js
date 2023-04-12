const TrafficLight = require( "../../traffic" );
const assert = require( "assert" );
describe( "TrafficLight", function () {
    describe( "colors", function () {
        it( "has 3 states", function () {
            const traffic = new TrafficLight();
            assert.equal( 3000, TrafficLight.colors );
        });
    });
});