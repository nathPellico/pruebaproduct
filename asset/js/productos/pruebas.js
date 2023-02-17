// Crear un objeto con los datos de los productos
const productos = [
    {
      id: '001',
      title: 'Producto 1',
      quantity: 2,
      unit_price: 50.00,
      currency_id: 'MXN'
    },
    {
      id: '002',
      title: 'Producto 2',
      quantity: 1,
      unit_price: 75.00,
      currency_id: 'MXN'
    }
  ];
  
  // Crear una solicitud HTTP para enviar los datos de los productos a PHP
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '../../../../pages/subcategorias/videovigilancia.php');
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.send(JSON.stringify(productos));