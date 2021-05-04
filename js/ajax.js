function encodeData(data) {
  const params = new URLSearchParams();
  Object.keys(data).forEach(function (key) {
    params.append(key, data[key]);
  });
  return params.toString();
}

function request(method, url, data, callback) {
  const xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
  xhr.open(method, url, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      callback(this);
    }
  };
  xhr.send(data !== null ? encodeData(data) : null);
}
