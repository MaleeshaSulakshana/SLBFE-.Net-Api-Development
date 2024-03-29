﻿using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Models
{
    public class Company
    {

        [Key]
        public int CompanyId { get; set; }

        public string Name { get; set; }

        public string Since { get; set; }

        public string Address { get; set; }

        public string Email { get; set; }

        public string Password { get; set; }

        public string Contacts { get; set; }

    }
}
