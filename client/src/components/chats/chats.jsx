import './chats.css'

function Chats() {
    return (
      <>
        <div className="row" id="menu">
          <div className="col-12 position-relative">
            <h1 id="messageFrom" ondblclick="nameEditor.show()"></h1>
          </div>
        </div>
        <div className="row" id="content">
          <div className="col-6" id="incoming"></div>
          <div className="col-6 d-flex flex-column justify-content-end align-items-end" id="outgoing"></div>
        </div>
        <div className="row" id="type">
          <form className="col-12 position-relative">
            <input type="text" placeholder="..." id="messageBar"></input>
            <i className="fa-regular fa-paper-plane"></i>
          </form>
        </div>
      </>
    )
  }
  
  export default Chats
  