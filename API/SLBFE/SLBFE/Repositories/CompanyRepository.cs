using Microsoft.EntityFrameworkCore;
using SLBFE.Contexts;
using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Repositories
{
    public class CompanyRepository : ICompanyRepository
    {
        protected ModelsDbContext _context;

        public CompanyRepository(ModelsDbContext context)
        {
            _context = context;
        }

        public Company GetCompany(int id)
        {
            return _context.Company.AsNoTracking().FirstOrDefault(c => c.CompanyId == id);
        }

        public Company GetCompanyByEmail(string email)
        {
            return _context.Company.AsNoTracking().FirstOrDefault(c => c.Email == email);
        }

        public IEnumerable<Company> GetCompanys()
        {
            return _context.Company.AsNoTracking().ToList();
        }

        public void AddCompany(Company company)
        {
            _context.Company.Add(company);
            _context.SaveChanges();
        }

        public void DeleteCompany(Company company)
        {
            _context.Remove(company);
            _context.SaveChanges();
        }

        public void UpdateCompany(Company company)
        {
            _context.Entry(company).State = EntityState.Modified;
            _context.SaveChanges();
        }
    }
}
