

    .proposal-card {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      text-align: center;
      max-width: 400px;
      width: 100%;
    }

    .proposal-card h2 {
      margin-bottom: 10px;
    }

    .proposal-card p {
      color: #555;
      margin-bottom: 20px;
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
    }

    .btn {
      padding: 10px 20px;
      border-radius: 5px;
      border: none;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn-accept {
      background-color: #28a745;
      color: white;
    }

    .btn-deny {
      background-color: #dc3545;
      color: white;
    }

    .btn:hover {
      opacity: 0.85;
    }


  <div class="proposal-card">
    <h2>Proposal from Mahidul Islam</h2>
    <p>Are you interested in connecting with this member?</p>
    <div class="btn-group">
      <button class="btn btn-accept">Accept</button>
      <button class="btn btn-deny">Deny</button>
    </div>
  </div>

