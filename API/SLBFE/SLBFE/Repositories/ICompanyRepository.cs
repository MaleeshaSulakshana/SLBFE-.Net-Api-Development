using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Repositories
{
    public interface ICompanyRepository
    {

        Company GetCompany(int id);

        Company GetCompanyByEmail(string email);

        IEnumerable<Company> GetCompanys();

        void AddCompany(Company company);

        void UpdateCompany(Company company);

        void DeleteCompany(Company company);

    }
}
