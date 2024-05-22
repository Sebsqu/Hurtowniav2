import React, { useState, useEffect } from 'react';

function ProductList(){
    const [products, setProducts] = useState([]);

    useEffect(() => {
        const fetchProducts = async () => {
          try {
            const response = await fetch('http://localhost:8000/api/products');
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            const data = await response.json();
            setProducts(data);
          } catch (error) {
            console.error('Error fetching products:', error);
          }
        };
    
        fetchProducts();
      }, []);

      return (
        <div>
          <h1>Lista produktów</h1>
          <ul>
            {products.map(product => (
              <li key={product.id}>
                ID: {product.id}, Name: {product.name}, PriceBrutto: {product.priceBrutto}
              </li>
            ))}
          </ul>
        </div>
      );
    
}


export default ProductList;
