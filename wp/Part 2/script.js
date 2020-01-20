function setPrice(textId, qtyValue, price)
{
  var displayValue = price * qtyValue;
  document.getElementById(textId).innerHTML = "$" +displayValue.toFixed(2);
}

function dropDownPrice(textId, selectvalue, smlPrice, medPrice, lrgPrice, currentPrice, qtyValue)
{
  if (selectvalue == 'SML')
  {
    num = smlPrice;
    setPrice(textId, qtyValue, smlPrice);
  }
  if (selectvalue == 'MED')
  {
    num = medPrice;
    setPrice(textId, qtyValue, medPrice);
  }
  if (selectvalue == 'LRG')
  {
    num = lrgPrice;
    setPrice(textId, qtyValue, lrgPrice);
  }
  return num;
}
function incrament(qtyID) {
  if (document.getElementById(qtyID).value < 99) {
    document.getElementById(qtyID).value++;
  }
}
function decrease(qtyID) {
  if (document.getElementById(qtyID).value > 1) {
    document.getElementById(qtyID).value--;
  }
}
function setImage(imageId, productId) {
  document.getElementById(imageId).src = "../../media/" + productId + ".jpg";
}

function changeText(message, textId) {
  document.getElementsById(textId).innerHTML = message;
}

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
