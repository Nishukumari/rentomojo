using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Hotel
{
    #region Reg
    public class Reg
    {
        #region Member Variables
        protected string _email;
        protected string _password;
        protected string _name;
        protected unknown _contact;
        #endregion
        #region Constructors
        public Reg() { }
        public Reg(string email, string password, string name, unknown contact)
        {
            this._email=email;
            this._password=password;
            this._name=name;
            this._contact=contact;
        }
        #endregion
        #region Public Properties
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual unknown Contact
        {
            get {return _contact;}
            set {_contact=value;}
        }
        #endregion
    }
    #endregion
}