<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <style type="text/css">
      textarea {
        width: 500px;
        height: 100px;
      }

      textarea[name="results"] {
        height: 300px;
      }
      
      .hidden { display: none; }
    </style>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    
    <h1>Rest API Demo</h1>

    Verb/HTTP Method:<br />
    <select name="verb">
      <option value="GET">GET</option>
      <option value="POST">POST</option>
      <option value="PUT">PUT</option>
      <option value="DELETE">DELETE</option>
    </select>
    <br />
    <br />
    Resource for endpoint:<br />
    <input name="resource" value="Corp" />
    <br />
    <br />
    <b>Data (Optional):</b><br />
    <span id="idfield">ID <input type="number" name="id" value="" /></span>
    <br />
    Corporation Name <input type="text" name="corp" value="" />
    <br />
    Incorporation Date <input type="date" name="incorp_dt" value="" />
    <br />
    Email <input type="email" name="email" value="" />
    <br />
    Owner <input type="text" name="owner" value="" />
    <br />
    Phone <input type="tel" name="phone">
    <br />
    Location (Coordinates) <input type="text" name="location">
    <br />
    <br />
    <button>Make Call</button>
    <h3>Results</h3>

    <textarea name="results"></textarea>

    <script type="text/javascript">
      document.querySelector('button').addEventListener('click', makeCall);
      $('[name=verb]').on('change', function() {
        if($(this).val() != "POST")
          $('#idfield').show();
        else
          $('#idfield').hide();
      });
      
      function makeCall() {
        var verbfield = document.querySelector('select[name="verb"]');
        var verb = verbfield.options[verbfield.selectedIndex].value;
        var resource = document.querySelector('input[name="resource"]').value;
        var data = {
          'corp': document.querySelector('input[name="corp"]').value,
          'incorp_dt': document.querySelector('input[name="incorp_dt"]').value,
          'email': document.querySelector('input[name="email"]').value,
          'owner': document.querySelector('input[name="owner"]').value,
          'phone': document.querySelector('input[name="phone"]').value,
          'location': document.querySelector('input[name="location"]').value
        };
        
        var results = document.querySelector('textarea[name="results"]');
        var httpRequest = new XMLHttpRequest();
        var url = './api/v1/' + resource;
        var id = document.querySelector('input[name="id"]').value;

        if(id != null && id != undefined && id != "")
          data.id = id;
        
        httpRequest.open(verb, url, true);
        httpRequest.addEventListener('readystatechange', callComplete);

        function callComplete() {
          if (this.readyState === XMLHttpRequest.DONE) {
            results.value = this.responseText;
          } // else waiting for the call to complete
        }

        if (verb === 'GET') {
          if(id == null || id == undefined || id == "") {
            httpRequest.send(null);
          }    
          else {
            httpRequest.open("GET", url+"/"+id, true);
            httpRequest.send(null);
          }
        } 
        else if(verb === 'PUT') {
          if(id != null) {
            httpRequest.open("PUT", url+"/"+id, true);
          httpRequest.setRequestHeader('Content-type', 'application/json;charset=UTF-8');
            httpRequest.send(JSON.stringify(data));
          }
        }
        else {
          httpRequest.setRequestHeader('Content-type', 'application/json;charset=UTF-8');
          httpRequest.send(JSON.stringify(data));
        }
      }
    </script>
  </body>
</html>
