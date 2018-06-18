var express = require('express');
var app = express();
var fs = require('fs');

app.set('port', (process.env.PORT || 80))
app.use(express.static(__dirname + '/public'))

app.get('/', function(request, response) {
  response.send('Hello World!')
})

app.listen(app.get('port'), function() {
  console.log("Node app is running at localhost:" + app.get('port'))
})

// This function was added to try and read the HTML file from the E-Voice folder.
function onRequest(request, response) {
  response.writeHead(200, {'Content-Type': 'text/plain'});
  fs.readFile('./E-Voice/index.html', null, function(error, data) {
    if (error) {
      response.writeHead(404);
      response.write('File not found');
  } else {
      response.write(data);
  }
    response.end();
});
