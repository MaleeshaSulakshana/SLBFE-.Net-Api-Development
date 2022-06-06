using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Repositories
{
    public interface IAuthRepository
    {

        Citizen CitizenLogin(Citizen citizen);

        Officer OfficerLogin(Officer officer);

        Company CompanyLogin(Company company);

    }
}
