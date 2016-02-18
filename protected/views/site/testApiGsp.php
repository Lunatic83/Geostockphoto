<script type="text/javascript">
 
        var isIE8 = window.XDomainRequest ? true : false;
        var invocation = createCrossDomainRequest();
        //var url = 'http://geostockphoto.com/photo/updateMap/latSW/-50.870692050148655/lngSW/-180/latNE/78.99797460321273/lngNE/180/zoom/2/idPhotoType/1';        
 		var url = "http://geostockphoto.com/photo/apiGetPhotos";
 
        function createCrossDomainRequest(url, handler)
        {
            var request;
            if (isIE8)
            {
                request = new window.XDomainRequest();
            }
            else
            {
                request = new XMLHttpRequest();
            }
            return request;
        }
 
        function callOtherDomain()
        {
            if (invocation)
            {
                if(isIE8)
                {
                    invocation.onload = outputResult;
                    invocation.open("GET", url, true);
                    invocation.send();
                }
                else
                {
                    invocation.open('GET', url, true);
                    invocation.onreadystatechange = handler;
                    invocation.send();
                }
            }
            else
            {
                var text = "No Invocation TookPlace At All";
                var textNode = document.createTextNode(text);
                var textDiv = document.getElementById("gsp_response");
                textDiv.appendChild(textNode);
            }
        }
         
        function handler(evtXHR)
        {
            if (invocation.readyState == 4)
            {
                if (invocation.status == 200)
                {
                    outputResult();
                }
                else
                {
                    alert("Invocation Errors Occured");
                }
            }
        }
 
        function outputResult()
        {
            var response = invocation.responseText;
            var textDiv = document.getElementById("gsp_response");
            textDiv.innerHTML += response;
        }
    </script>
<div style="margin-top: 30px">
	<a onclick="callOtherDomain()" style="cursor: pointer">Test Api UpdateMap Cross-Domain</a>
	<br>
	<a onclick="ajaxFunctionGeneric(
		'http://geostockphoto.com/photo/updateMap/latSW/-50.870692050148655/lngSW/-180/latNE/78.99797460321273/lngNE/180/zoom/2/idPhotoType/1',
		'gsp_response',
		null)" style="cursor: pointer">Test Api UpdateMap</a>
	<br>
	<a onclick="ajaxFunctionGeneric(
		'http://geostockphoto.com/photo/apiGetPhotos',
		'gsp_response',
		null)" style="cursor: pointer">Test ApiGetPhotos
	</a>
</div>

<div id="gsp_response"></div>